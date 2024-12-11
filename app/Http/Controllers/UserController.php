<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\UserLogin;
use App\Models\Preinscripcion;
use App\Models\UserLoginApoderado;


class UserController extends Controller
{
    public function showLogin(){
        return view('login');
    }

    /*public function verificalogin(Request $request) 
    {
        //return dd($request->all());
        $data=request()->validate([
            'name'=>'required',
            'password'=>'required'
        ],
        [
            'name.required'=>'Ingrese Usuario',
            'password.required'=>'Ingrese contraseña',
        ]);
        if (Auth::attempt($data))
        {
            $con='OK';
        }
        $name=$request->get('name');
        $query=User::where('name','=',$name)->get();
        if ($query->count()!=0)
        {
            $hashp=$query[0]->password;
            $password=$request->get('password');
            if (password_verify($password, $hashp))
            {
                return redirect()->route('prueba');
            }
            else
            {
                return back()->withErrors(['password'=>'Contraseña no válida'])->withInput(request(['name', 'password']));
            }
        }
        else
        {
            return back()->withErrors(['name'=>'Usuario no válido'])->withInput(request(['name']));
        }
    }*/


    //Permitir el ingreso de diferentes usuarios
    public function verifylogin(Request $request){
        $credentials = [
            'userLogin' => $request->input('name'),
            'password' => $request->input('password')
        ];


        //Verificar en la tabla USER_LOGIN (Personal)
        if($user=UserLogin::where('userLogin',$credentials['userLogin'])->first()){
            if(Auth::guard('web')->attempt($credentials)){
                $personal = $user->personal;
                if ($personal && $personal->tipoPersonal && $personal->departamento) {
                    cookie('session_web_2_' . md5(env('APP_KEY')));

                    return $this->redirigirPorRolYDepartamento($personal->tipoPersonal->tipoPersonal, $personal->departamento->departamento);
                }
            }
        }


        //Verificar en la tabla USER_LOGIN_APODERADO
        if($apoderadoLogin=UserLoginApoderado::where('userLogin',$credentials['userLogin'])->first()){
            if(Auth::guard('apoderados')->attempt($credentials)){
                
                cookie('session_apoderado_2_' . md5(env('APP_KEY')));
                //Obtener el apoderado relacionado al login
                $apoderado = $apoderadoLogin->apoderado; //Relacion belongsTo
                return redirect()->route('apoderadoInicio',['dniApoderado'=>$apoderado->dniApoderado]);
            }
        }

        $preinscripcion = Preinscripcion::where('correo', $request->input('name'))->first();

        if ($preinscripcion && $preinscripcion->dni === $request->input('password')) {
            //Auth::guard('preinscripcion')->login($preinscripcion);
            cookie('sesion_preinscripcion_' . md5(env('APP_KEY')));

            
            return redirect()->route('preinscripcionIndex', ['idPreinscripcion' => $preinscripcion->idPreinscripcion]);
        }

        return back()->withError([
            'message'=> 'Las credenciales proporcionadas no son correctas.',
        ]);
    }

    /*public function verificalogin(Request $request){
        $credentials = [
            'userLogin' => $request->input('name'),
            'password' => $request->input('password')
        ];

        if (Auth::attempt($credentials)) {
            // Redirigir si la autenticación es correcta
            return redirect()->route('prueba');
        } else {
            // Redirigir si la autenticación falla
            return back()->withErrors([
                'message' => 'Las credenciales proporcionadas no son correctas.',
            ]);
            dd('error');
        }
    }*/

    private function redirigirPorRolYDepartamento($rol,$departamento){
        switch($rol){
            case 'Jefe':
                if($departamento=='Tesoreria'){
                    return redirect()->route('indexTesoreria');
                } 
            case 'Director':
                if($departamento=='Direccion'){
                    return redirect()->route('inicioDireccion');
                    //return view('director.index');
                }
            case 'Secretaria':
                if($departamento=='Oficina Registros'){
                    return redirect()->route('registroAcademico.index');
                }
        }
        
        return redirect()->route('prueba');
    }

    public function salir(){
        // Cerrar sesión de la secretaria
        Auth::guard('web')->logout();
        // Cerrar sesión del apoderado
        Auth::guard('apoderados')->logout();
        
        return redirect('/');
    }
}