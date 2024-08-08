<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name'=>'administrador']);
        $role2 = Role::create(['name'=>'Asistente']);
        $role3 = Role::create(['name'=>'Estudiante']);
        $role4 = Role::create(['name'=>'Profesor']);
        $role5 = Role::create(['name'=>'Secretaria']);

        Permission::create(['name' => 'administrador.prueba'])->syncRoles([$role1,$role2,$role3,$role4,$role5]);

        Permission::create(['name' => 'administrador.alumno.index'])->syncRoles([$role1,$role2,$role3,$role4,$role5]);
        
        Permission::create(['name' => 'administrador.alumno.create'])->syncRoles([$role1,$role2,$role5]);
        Permission::create(['name' => 'administrador.alumno.store'])->syncRoles([$role1,$role2,$role5]);
        Permission::create(['name' => 'administrador.alumno.confirmar'])->syncRoles([$role1,$role2,$role5]);
        Permission::create(['name' => 'administrador.alumno.edit'])->syncRoles([$role1,$role2,$role5]);
        Permission::create(['name' => 'administrador.alumno.update'])->syncRoles([$role1,$role2,$role5]);
        Permission::create(['name' => 'administrador.alumno.destroy'])->syncRoles([$role1,$role2,$role5]);
        Permission::create(['name' => 'administrador.alumno.cancelar'])->syncRoles([$role1,$role2,$role5]);

        Permission::create(['name' => 'administrador.curso.index'])->syncRoles([$role1,$role2,$role3,$role4,$role5]);
        
        Permission::create(['name' => 'administrador.curso.create'])->syncRoles([$role1,$role2,$role4,$role5]);
        Permission::create(['name' => 'administrador.curso.store'])->syncRoles([$role1,$role2,$role4,$role5]);
        Permission::create(['name' => 'administrador.curso.edit'])->syncRoles([$role1,$role2,$role4,$role5]);
        Permission::create(['name' => 'administrador.curso.update'])->syncRoles([$role1,$role2,$role4,$role5]);
        Permission::create(['name' => 'administrador.curso.destroy'])->syncRoles([$role1,$role2,$role4,$role5]);
        Permission::create(['name' => 'administrador.curso.confirmar'])->syncRoles([$role1,$role2,$role4,$role5]);
        Permission::create(['name' => 'administrador.curso.cancelar'])->syncRoles([$role1,$role2,$role4,$role5]);

        Permission::create(['name' => 'administrador.grado.index'])->syncRoles([$role1,$role2,$role3,$role4,$role5]);

        Permission::create(['name' => 'administrador.grado.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'administrador.grado.store'])->syncRoles([$role1]);
        Permission::create(['name' => 'administrador.grado.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'administrador.grado.update'])->syncRoles([$role1]);
        Permission::create(['name' => 'administrador.grado.destroy'])->syncRoles([$role1]);
        Permission::create(['name' => 'administrador.grado.confirmar'])->syncRoles([$role1]);
        Permission::create(['name' => 'administrador.grado.cancelar'])->syncRoles([$role1]);

        Permission::create(['name' => 'administrador.personal.index'])->syncRoles([$role1,$role2,$role3,$role4,$role5]);

        Permission::create(['name' => 'administrador.personal.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'administrador.personal.store'])->syncRoles([$role1]);
        Permission::create(['name' => 'administrador.personal.confirmar'])->syncRoles([$role1]);
        Permission::create(['name' => 'administrador.personal.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'administrador.personal.update'])->syncRoles([$role1]);
        Permission::create(['name' => 'administrador.personal.destroy'])->syncRoles([$role1]);
        Permission::create(['name' => 'administrador.personal.cancelar'])->syncRoles([$role1]);

        Permission::create(['name' => 'administrador.matricula.index'])->syncRoles([$role1,$role2,$role3,$role4,$role5]);

        Permission::create(['name' => 'administrador.matricula.create'])->syncRoles([$role1,$role5]);
        Permission::create(['name' => 'administrador.matricula.store'])->syncRoles([$role1,$role5]);
        Permission::create(['name' => 'administrador.matricula.confirmar'])->syncRoles([$role1,$role5]);
        Permission::create(['name' => 'administrador.matricula.edit'])->syncRoles([$role1,$role5]);
        Permission::create(['name' => 'administrador.matricula.update'])->syncRoles([$role1,$role5]);
        Permission::create(['name' => 'administrador.matricula.destroy'])->syncRoles([$role1,$role5]);
        Permission::create(['name' => 'administrador.matricula.cancelar'])->syncRoles([$role1,$role5]);

        Permission::create(['name' => 'administrador.registronotas'])->syncRoles([$role1,$role2,$role3,$role4,$role5]);
        Permission::create(['name' => 'administrador.catedra'])->syncRoles([$role1,$role2,$role3,$role4,$role5]);
        Permission::create(['name' => 'administrador.listadonotas'])->syncRoles([$role1,$role2,$role3,$role4,$role5]);

        // Permission::create(['name' => 'Asistente.personal.index']);

        // Permission::create(['name' => 'Estudiante.listadonotas']);


        // Permission::create(['name' => 'Profesor.registronotas']);
        // Permission::create(['name' => 'Profesor.catedra']);

        // Permission::create(['name' => 'Secretaria.personal.index']);
        // Permission::create(['name' => 'Secretaria.alumno.index']);
        // Permission::create(['name' => 'Secretaria.alumno.create']);
        // Permission::create(['name' => 'Secretaria.listadonotas']);
    }
}
