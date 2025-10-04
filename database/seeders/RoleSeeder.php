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
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Profesor']);
        $role3 = Role::create(['name' => 'Estudiante']);

        /*PERMISOS PARA EL INGRESO AL SISTEMA*/
        Permission::create (['name' => 'admin.dashboard'])->assignRole($role1); /*Agregar Permiso para la visualizacion del menu principal (Nota: Hacer uso de la ruta del dashboard)*/
        Permission::create (['name' => 'profesor.dashboard'])->assignRole($role2);
        Permission::create (['name' => 'estudiante.dashboard'])->assignRole($role3);

        /*PERMISOS PARA LAS NOTAS*/
        Permission::create (['name' => 'admin.notas.index'])->syncRoles($role1, $role2, $role3);
        Permission::create (['name' => 'admin.notas.create'])->syncRoles($role1, $role2); /*Agregar Permiso para la creacion de notas*/
        Permission::create (['name' => 'admin.notas.edit'])->syncRoles($role1, $role2); /*Agregar Permiso para la edicion de notas*/
        Permission::create (['name' => 'admin.notas.destroy'])->syncRoles($role1, $role2); /*Agregar Permiso para la eliminacion de notas*/

        /*PERMISOS PARA LAS ASIGNATURAS*/
        Permission::create (['name' => 'admin.asignaturas.index'])->syncRoles($role1, $role2); /*Agregar Permiso para la visualizacion de asignaturas*/
        Permission::create (['name' => 'admin.asignaturas.create'])->syncRoles($role1, $role2); /*Agregar Permiso para la creacion de asignaturas*/
        Permission::create (['name' => 'admin.asignaturas.edit'])->syncRoles($role1, $role2); /*Agregar Permiso para la edicion de asignaturas*/
        Permission::create (['name' => 'admin.asignaturas.destroy'])->syncRoles($role1, $role2); /*Agregar Permiso para la eliminacion de asignaturas*/

        /*PERMISOS PARA LOS HORARIOS*/
        Permission::create (['name' => 'admin.horarios.index'])->syncRoles($role1, $role2, $role3); /*Agregar Permiso para la visualizacion de horarios*/
        Permission::create (['name' => 'admin.horarios.create'])->assignRole($role1,); /*Agregar Permiso para la creacion de horarios*/
        Permission::create (['name' => 'admin.horarios.edit'])->assignRole($role1); /*Agregar Permiso para la edicion de horarios*/
        Permission::create (['name' => 'admin.horarios.destroy'])->assignRole($role1); /*Agregar Permiso para la eliminacion de horarios*/
    }
}
