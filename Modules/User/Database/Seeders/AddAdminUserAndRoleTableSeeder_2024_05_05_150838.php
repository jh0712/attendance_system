<?php

namespace Modules\User\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\User\Entities\User;
class AddAdminUserAndRoleTableSeeder_2024_05_05_150838 extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $this->call([]);
        $admin = $this->getAdminUser();
        $admin = User::create($admin);
        // assign role
        $admin->assignRole('admin');
    }
    public function getAdminUser(){
        return [
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => '1qaz2wsx', // password
            'remember_token' => null
        ];
    }
}
