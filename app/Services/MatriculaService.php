<?php

namespace App\Services;

use App\Models\COMPROBANTE_PAGO;
use App\Models\Periodo;
use App\Models\Notas;
use App\Models\Nivel;
use App\Models\Grado;
use App\Models\Matricula;
use App\Models\Seccion;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class MatriculaService
{
    public function renovarMatricula($codigoEstudiante,$idComprobante){
        //Obtenmos la ultima matricula del estudiante
        $ultimaMatricula = Matricula::where('estado',1)
            ->where('codigoEstudiante',(int) $codigoEstudiante)
            ->with([
                'alumno.notas',
                'seccion.grado.nivel',
                'periodo'
            ])
            ->first();

        //\Log::info('This->'. $codigoEstudiante.'-'.$idComprobante);
        
        
        //Obtener los cursos y promedios del estudiante
        $cursos = $this->obtenerCursosYNotas($codigoEstudiante);

        $cursosJaladosPrimaria = ['Matematica','Comunicacion'];
        $cantidadCursosJalados = 0;
        $pasaDeGrado = true;

        //Primaria
        if($ultimaMatricula->seccion->grado->nivel->nivel == 'Primaria'){
            foreach($cursos as $curso){
                if(in_array($curso->Curso, $cursosJaladosPrimaria) && $curso->Nota<10.5){
                    $cantidadCursosJalados++;
                    if($cantidadCursosJalados==2){
                        $pasaDeGrado = false;
                        break;
                    }
                }
            }
        }else{
            //Secundaria
            foreach($cursos as $curso){
                if($curso->Nota < 10.5){
                    $cantidadCursosJaladosSecundaria++;
                }
                if($cantidadCursosJaladosSecundaria>=4){
                    $pasaGrado = false;
                }
            }
        }


        $gradoActual = $ultimaMatricula->seccion->grado->grado;
        $nivelActual = $ultimaMatricula->seccion->grado->nivel->nivel;
        if($pasaDeGrado){
            $nuevoGrado = $this->obtenerSiguienteGrado($gradoActual);
            $nuevoNivel = $this->obtenerSiguienteNivel($gradoActual,$nivelActual);
        }

        //Encontramos el idSeccion

        $nuevoLevel = Seccion::where('seccion', $ultimaMatricula->seccion->seccion)
                                ->whereHas('grado', function($query) use ($nuevoGrado, $nuevoNivel) {
                                    $query->where('grado', $nuevoGrado)
                                        ->whereHas('nivel', function($query) use ($nuevoNivel) {
                                            $query->where('nivel', $nuevoNivel); // Accedemos al atributo 'nivel'
                                        });
                                })
                                ->first();
        

        //Encontramos el nuevo periodo
        $periodo = Periodo::where('estado',1)->first();

        //La ultima matricula se desactiva
        $ultimaMatricula->update([
            'estado'=>0,
        ]);

        

        //Creamos matricula
        Matricula::create([
            'codigoEstudiante'=>$ultimaMatricula->codigoEstudiante,
            'idSeccion'=>$nuevoLevel->idSeccion,
            'idPeriodo'=>$periodo->idPeriodo,
            'fechaMatricula'=> Carbon::now()->toDateTimeString(),
            'estado'=>1,
        ]);


        
        /*
        'codigoEstudiante',
        'idSeccion',
        'idPeriodo',
        'fechaMatricula',
        'estado'
        */
        
    }

    private function obtenerCursosYNotas($codigoEstudiante){
        $cursos = 
        DB::select("
            SELECT estudiante.codigoEstudiante AS Estudiante,
                periodo_escolar.idPeriodo AS Periodo,
                curso.nombre_curso AS Curso,
                AVG(notas.nota) AS Nota
            FROM notas
            INNER JOIN catedra ON catedra.idCatedra = notas.idCatedra
            INNER JOIN curso ON curso.idCurso = catedra.idCurso
            INNER JOIN periodo_escolar ON periodo_escolar.idPeriodo = catedra.idPeriodo
            INNER JOIN bimestre ON bimestre.idBimestre = notas.idBimestre
            INNER JOIN estudiante ON estudiante.codigoEstudiante = notas.codigoEstudiante
            INNER JOIN (
                SELECT DISTINCT codigoEstudiante, idPeriodo
                FROM matriculas
                WHERE estado = 1
            ) AS matricula_activas ON matricula_activas.codigoEstudiante = estudiante.codigoEstudiante
                                    AND matricula_activas.idPeriodo = periodo_escolar.idPeriodo
            WHERE estudiante.codigoEstudiante = ?
            GROUP BY curso.nombre_curso,estudiante.codigoEstudiante,periodo_escolar.idPeriodo
        ", [$codigoEstudiante]);
        return $cursos;
    }

    private function obtenerSiguienteGrado($gradoActual){
        $grados = ['Primero', 'Segundo', 'Tercero', 'Cuarto', 'Quinto', 'Sexto'];
        $indiceActual = array_search($gradoActual,$grados);
        return $indiceActual < count($grados) - 1 ? $grados[$indiceActual + 1] : $grados[0]; 
    }

    private function obtenerSiguienteNivel($grado,$nivelActual){
        if($grado === 'Sexto' && $nivelActual==='Primaria'){
            return 'Secundaria';
        }

        return $nivelActual;
    }
}
