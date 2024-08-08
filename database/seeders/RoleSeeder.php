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

        Permission::create(['name' => 'Administrador.prueba'])->syncRoles([$role1,$role2,$role3,$role4,$role5]);
        Permission::create(['name' => 'Administrador.alumnos.index'])->syncRoles([$role1,$role2,$role3,$role4,$role5]);
        Permission::create(['name' => 'Administrador.alumno.create'])->syncRoles([$role1,$role2,$role3,$role4,$role5]);
        Permission::create(['name' => 'Administrador.alumno.store'])->syncRoles([$role1,$role2,$role3,$role4,$role5]);
        Permission::create(['name' => 'Administrador.alumno.confirmar'])->syncRoles([$role1,$role2,$role3,$role4,$role5]);
        Permission::create(['name' => 'Administrador.alumno.edit'])->syncRoles([$role1,$role2,$role3,$role4,$role5]);
        Permission::create(['name' => 'Administrador.alumno.update'])->syncRoles([$role1,$role2,$role3,$role4,$role5]);
        Permission::create(['name' => 'Administrador.alumno.destroy'])->syncRoles([$role1,$role2,$role3,$role4,$role5]);
        Permission::create(['name' => 'Administrador.alumno.cancelar'])->syncRoles([$role1,$role2,$role3,$role4,$role5]);

        Permission::create(['name' => 'Administrador.curso.index'])->syncRoles([$role1,$role2,$role3,$role4,$role5]);
        Permission::create(['name' => 'Administrador.curso.create'])->syncRoles([$role1,$role2,$role3,$role4,$role5]);
        Permission::create(['name' => 'Administrador.curso.store'])->syncRoles([$role1,$role2,$role3,$role4,$role5]);
        Permission::create(['name' => 'Administrador.curso.edit'])->syncRoles([$role1,$role2,$role3,$role4,$role5]);
        Permission::create(['name' => 'Administrador.curso.update'])->syncRoles([$role1,$role2,$role3,$role4,$role5]);
        Permission::create(['name' => 'Administrador.curso.destroy'])->syncRoles([$role1,$role2,$role3,$role4,$role5]);
        Permission::create(['name' => 'Administrador.curso.confirmar'])->syncRoles([$role1,$role2,$role3,$role4,$role5]);
        Permission::create(['name' => 'Administrador.curso.cancelar'])->syncRoles([$role1,$role2,$role3,$role4,$role5]);

        Permission::create(['name' => 'Administrador.grado.index'])->syncRoles([$role1,$role2,$role3,$role4,$role5]);
        Permission::create(['name' => 'Administrador.grado.create'])->syncRoles([$role1,$role2,$role3,$role4,$role5]);
        Permission::create(['name' => 'Administrador.grado.store'])->syncRoles([$role1,$role2,$role3,$role4,$role5]);
        Permission::create(['name' => 'Administrador.grado.edit'])->syncRoles([$role1,$role2,$role3,$role4,$role5]);
        Permission::create(['name' => 'Administrador.grado.update'])->syncRoles([$role1,$role2,$role3,$role4,$role5]);
        Permission::create(['name' => 'Administrador.grado.destroy'])->syncRoles([$role1,$role2,$role3,$role4,$role5]);
        Permission::create(['name' => 'Administrador.grado.confirmar'])->syncRoles([$role1,$role2,$role3,$role4,$role5]);
        Permission::create(['name' => 'Administrador.grado.cancelar'])->syncRoles([$role1,$role2,$role3,$role4,$role5]);

        Permission::create(['name' => 'Administrador.personal.index'])->syncRoles([$role1,$role2,$role3,$role4,$role5]);
        Permission::create(['name' => 'Administrador.personal.create'])->syncRoles([$role1,$role2,$role3,$role4,$role5]);
        Permission::create(['name' => 'Administrador.personal.store'])->syncRoles([$role1,$role2,$role3,$role4,$role5]);
        Permission::create(['name' => 'Administrador.personal.confirmar'])->syncRoles([$role1,$role2,$role3,$role4,$role5]);
        Permission::create(['name' => 'Administrador.personal.edit'])->syncRoles([$role1,$role2,$role3,$role4,$role5]);
        Permission::create(['name' => 'Administrador.personal.update'])->syncRoles([$role1,$role2,$role3,$role4,$role5]);
        Permission::create(['name' => 'Administrador.personal.destroy'])->syncRoles([$role1,$role2,$role3,$role4,$role5]);
        Permission::create(['name' => 'Administrador.personal.cancelar'])->syncRoles([$role1,$role2,$role3,$role4,$role5]);

        Permission::create(['name' => 'Administrador.registronotas'])->syncRoles([$role1,$role2,$role3,$role4,$role5]);
        Permission::create(['name' => 'Administrador.catedra'])->syncRoles([$role1,$role2,$role3,$role4,$role5]);
        Permission::create(['name' => 'Administrador.listadonotas'])->syncRoles([$role1,$role2,$role3,$role4,$role5]);
        

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
