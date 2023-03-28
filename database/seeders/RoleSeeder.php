<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        //  
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'EstudianteUsuario']);
        $role3 = Role::create(['name' => 'DocenteUsuario']);

        Permission::create(['name' => 'admin.home'])->syncRoles([$role1, $role2]);
        
        Permission::create(['name' => 'admin.users.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.update'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.estudiante.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.estudiante.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.estudiante.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.estudiante.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.docente.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.docente.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.docente.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.docente.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.matricula.index'])->syncRoles([$role1]); // ver matricula desde el punto de vista del estudiante opcion1
        Permission::create(['name' => 'admin.matricula.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.matricula.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.matricula.destroy'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.matricula.show'])->syncRoles([$role1]); // ver matricula desde el punto de vista del estudiante opcion2

        Permission::create(['name' => 'admin.reportenotas.index'])->syncRoles([$role1, $role2]); // ver libreta de notas desde el punot de vista del estudiante opcion1
        Permission::create(['name' => 'admin.reportenotas.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.reportenotas.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.reportenotas.destroy'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.reportenotas.show'])->syncRoles([$role1, $role2]); // ver libreta de notas desde el punot de vista del estudiante opcion2

        Permission::create(['name' => 'admin.asignacion.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.asignacion.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.asignacion.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.asignacion.destroy'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.asignacion.show'])->syncRoles([$role1, $role3]); // ver asignacion desde el punto de vista del docente

        Permission::create(['name' => 'admin.curso.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.curso.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.curso.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.curso.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.colocacionnotas.index'])->syncRoles([$role1, $role3]); // colocar notas desde el punto de vista del docente opcion1
        Permission::create(['name' => 'admin.colocacionnotas.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.colocacionnotas.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.colocacionnotas.destroy'])->syncRoles([$role1]);
 
        Permission::create(['name' => 'admin.fichamatricula.index'])->syncRoles([$role1, $role2]); // colocar notas desde el punto de vista del docente opcion1
        Permission::create(['name' => 'admin.fichamatricula.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.fichamatricula.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.fichamatricula.destroy'])->syncRoles([$role1]);
 

    }
}
