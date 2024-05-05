<?php

namespace Modules\Permission\Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
class AddBaseRolesTableSeeder_2024_05_05_145051 extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'name' => 'admin',
                'guard_name' => 'web',
            ],
            [
                'name' => 'coach',
                'guard_name' => 'web',
            ],
            [
                'name' => 'parents',
                'guard_name' => 'web',
            ]
        ];
        // create role by model
        Role::insert($roles);
    }
}
