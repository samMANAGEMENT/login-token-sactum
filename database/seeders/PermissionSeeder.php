<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            'crear-rol',
            'editar-rol',
            'eliminar-rol',
            'crear-usuario',
            'editar-usuario',
            'eliminar-usuario',
            'crear-mesa',
            'editar-mesa',
            'eliminar-mesa',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}