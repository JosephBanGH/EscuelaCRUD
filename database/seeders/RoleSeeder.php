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
        $role1 = Role::create(['name'=>'Administrador']);
        $role2 = Role::create(['name'=>'Asistente']);
        $role3 = Role::create(['name'=>'Estudiante']);
        $role4 = Role::create(['name'=>'Profesor']);
        $role5 = Role::create(['name'=>'Secretaria']);

        $role1 = Role::create(['name'=>'Administrador']);
        $role2 = Role::create(['name'=>'Asistente']);
        $role3 = Role::create(['name'=>'Estudiante']);
        $role4 = Role::create(['name'=>'Profesor']);
        $role5 = Role::create(['name'=>'Secretaria']);

        Permission::create(['name' => 'Administrador.prueba']);
        Permission::create(['name' => 'Administrador.alumnos.index']);
        Permission::create(['name' => 'Administrador.alumno.create']);
        Permission::create(['name' => 'Administrador.alumno.store']);
        Permission::create(['name' => 'Administrador.alumno.confirmar']);
        Permission::create(['name' => 'Administrador.alumno.edit']);
        Permission::create(['name' => 'Administrador.alumno.update']);
        Permission::create(['name' => 'Administrador.alumno.destroy']);
        Permission::create(['name' => 'Administrador.alumno.cancelar']);

        Permission::create(['name' => 'Administrador.curso.index']);
        Permission::create(['name' => 'Administrador.curso.create']);
        Permission::create(['name' => 'Administrador.curso.store']);
        Permission::create(['name' => 'Administrador.curso.edit']);
        Permission::create(['name' => 'Administrador.curso.update']);
        Permission::create(['name' => 'Administrador.curso.destroy']);
        Permission::create(['name' => 'Administrador.curso.confirmar']);
        Permission::create(['name' => 'Administrador.curso.cancelar']);

        Permission::create(['name' => 'Administrador.grado.index']);
        Permission::create(['name' => 'Administrador.grado.create']);
        Permission::create(['name' => 'Administrador.grado.store']);
        Permission::create(['name' => 'Administrador.grado.edit']);
        Permission::create(['name' => 'Administrador.grado.update']);
        Permission::create(['name' => 'Administrador.grado.destroy']);
        Permission::create(['name' => 'Administrador.grado.confirmar']);
        Permission::create(['name' => 'Administrador.grado.cancelar']);

        Permission::create(['name' => 'Administrador.personal.index']);
        Permission::create(['name' => 'Administrador.personal.create']);
        Permission::create(['name' => 'Administrador.personal.store']);
        Permission::create(['name' => 'Administrador.personal.confirmar']);
        Permission::create(['name' => 'Administrador.personal.edit']);
        Permission::create(['name' => 'Administrador.personal.update']);
        Permission::create(['name' => 'Administrador.personal.destroy']);
        Permission::create(['name' => 'Administrador.personal.cancelar']);

        Permission::create(['name' => 'Administrador.registronotas']);
        Permission::create(['name' => 'Administrador.catedra']);
        Permission::create(['name' => 'Administrador.listadonotas']);
        

        Permission::create(['name' => 'Asistente.personal.index']);

    
        Permission::create(['name' => 'Estudiante.listadonotas']);


        Permission::create(['name' => 'Profesor.registronotas']);
        Permission::create(['name' => 'Profesor.catedra']);

        Permission::create(['name' => 'Secretaria.personal.index']);
        Permission::create(['name' => 'Secretaria.alumnos.index']);
        Permission::create(['name' => 'Secretaria.alumno.create']);
        Permission::create(['name' => 'Secretaria.listadonotas']);
    }
}
