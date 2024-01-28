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
        $admin = Role::create(['name' => 'Admin']);
        $profesor = Role::create(['name' => 'Usuario']);

        Permission::create(['name' => 'admin.home'])->syncRoles([$admin, $profesor]);

        Permission::create(['name' => 'admin.actividades.index'])->syncRoles([$admin, $profesor]);
        Permission::create(['name' => 'admin.actividades.create'])->syncRoles([$admin, $profesor]);
        Permission::create(['name' => 'admin.actividades.show'])->syncRoles([$admin, $profesor]);
        Permission::create(['name' => 'admin.actividades.edit'])->syncRoles([$admin, $profesor]);
        Permission::create(['name' => 'admin.actividades.destroy'])->syncRoles([$admin, $profesor]);

        Permission::create(['name' => 'admin.usuario.index'])->assignRole('Admin');
        Permission::create(['name' => 'admin.usuario.create'])->assignRole('Admin');
        Permission::create(['name' => 'admin.usuario.show'])->assignRole('Admin');
        Permission::create(['name' => 'admin.usuario.edit'])->assignRole('Admin');
        Permission::create(['name' => 'admin.usuario.destroy'])->assignRole('Admin');

        Permission::create(['name' => 'admin.grupo.index'])->syncRoles([$admin, $profesor]);
        Permission::create(['name' => 'admin.grupo.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.grupo.show'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.grupo.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.grupo.destroy'])->syncRoles([$admin]);
    }
}
