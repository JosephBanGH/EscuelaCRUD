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
    }
}