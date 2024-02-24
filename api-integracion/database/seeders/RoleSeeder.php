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
        $admin = Role::create(['name' => 'Administrador']);
        $ayuntamiento = Role::create(['name' => 'Ayuntamiento']);
        $comercio = Role::create(['name' => 'Comercio']);
        $particular = Role::create(['name' => 'Particular']);

        Permission::create(['name' => 'admin.home'])->syncRoles([$admin]);

        Permission::create(['name' => 'admin.actividades.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.actividades.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.actividades.show'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.actividades.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.actividades.destroy'])->syncRoles([$admin]);

        Permission::create(['name' => 'admin.usuario.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.usuario.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.usuario.show'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.usuario.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.usuario.destroy'])->syncRoles([$admin]);

        Permission::create(['name' => 'admin.grupo.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.grupo.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.grupo.show'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.grupo.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.grupo.destroy'])->syncRoles([$admin]);
    }
}
