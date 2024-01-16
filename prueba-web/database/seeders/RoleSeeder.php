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
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Usuario']);

        Permission::create(['name' => 'admin.usuarios.login']);
        Permission::create(['name' => 'admin.usuarios.create'])->assignRole($role1);

        Permission::create(['name' => 'admin.categorias.index'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.categorias.create'])->assignRole($role1);;
        Permission::create(['name' => 'admin.categorias.destroy'])->assignRole($role1);;
        Permission::create(['name' => 'admin.categorias.edit'])->assignRole($role1);;

        Permission::create(['name' => 'admin.juegos.index'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.juegos.create'])->assignRole($role1);;
        Permission::create(['name' => 'admin.juegos.destroy'])->assignRole($role1);;
        Permission::create(['name' => 'admin.juegos.edit'])->assignRole($role1);;

    }
}
