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

        Permission::create(['name' => 'admin.usuarios.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.usuarios.show'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.usuarios.destroy'])->syncRoles([$admin]);

        Permission::create(['name' => 'admin.ayuntamiento.index'])->syncRoles([$admin, $ayuntamiento, $comercio, $ayuntamiento]);
        Permission::create(['name' => 'admin.ayuntamiento.store'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.ayuntamiento.show'])->syncRoles([$admin, $ayuntamiento, $comercio, $ayuntamiento]);
        Permission::create(['name' => 'admin.ayuntamiento.update'])->syncRoles([$admin, $ayuntamiento]);
        Permission::create(['name' => 'admin.ayuntamiento.destroy'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.ayuntamiento.verify'])->syncRoles([$admin, $ayuntamiento]);

        Permission::create(['name' => 'admin.comercio.index'])->syncRoles([$admin, $comercio, $particular, $ayuntamiento]);
        Permission::create(['name' => 'admin.comercio.store'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.comercio.show'])->syncRoles([$admin, $comercio, $particular, $ayuntamiento]);
        Permission::create(['name' => 'admin.comercio.update'])->syncRoles([$admin, $comercio]);
        Permission::create(['name' => 'admin.comercio.destroy'])->syncRoles([$admin]);

        Permission::create(['name' => 'admin.particular.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.particular.store'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.particular.show'])->syncRoles([$admin, $particular]);
        Permission::create(['name' => 'admin.particular.update'])->syncRoles([$admin, $particular]);
        Permission::create(['name' => 'admin.particular.destroy'])->syncRoles([$admin]);

        Permission::create(['name' => 'admin.seguidos.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.seguidos.info'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.seguidos.store'])->syncRoles([$admin, $particular]);
        Permission::create(['name' => 'admin.seguidos.show'])->syncRoles([$admin, $particular]);
        Permission::create(['name' => 'admin.seguidos.destroy'])->syncRoles([$admin, $particular]);

        Permission::create(['name' => 'admin.publicacion.index'])->syncRoles([$admin, $comercio, $particular, $ayuntamiento]);
        Permission::create(['name' => 'admin.publicacion.store'])->syncRoles([$admin, $comercio]);
        Permission::create(['name' => 'admin.publicacion.show'])->syncRoles([$admin, $comercio, $particular, $ayuntamiento]);
        Permission::create(['name' => 'admin.publicacion.update'])->syncRoles([$admin, $comercio]);
        Permission::create(['name' => 'admin.publicacion.destroy'])->syncRoles([$admin, $comercio]);

        Permission::create(['name' => 'admin.etiquetas.index'])->syncRoles([$admin, $comercio, $particular, $ayuntamiento]);
        Permission::create(['name' => 'admin.etiquetas.store'])->syncRoles([$admin, $comercio]);
        Permission::create(['name' => 'admin.etiquetas.show'])->syncRoles([$admin, $comercio, $particular, $ayuntamiento]);
        Permission::create(['name' => 'admin.etiquetas.update'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.etiquetas.destroy'])->syncRoles([$admin]);
    }
}
