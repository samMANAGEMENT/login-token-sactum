<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        if (!Role::where('name', 'Admin')->exists()) {
            $admin = Role::create(['name' => 'Admin']);
            $admin->givePermissionTo(['crear-usuario', 'editar-usuario', 'eliminar-usuario']);
        }

        $gestorProducto = Role::create(['name' => 'Gestor mesas']);
        $gestorProducto->givePermissionTo(['crear-mesa', 'editar-mesa', 'eliminar-mesa']);
    }
}
