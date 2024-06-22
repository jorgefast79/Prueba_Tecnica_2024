<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();
        Role::truncate();

        $user = User::create([
            'name' => 'Jorge',
            'email' => 'jorgefast79@gmail.com',
            'password' => '12345678'

        ]);

        $role = Role::create([
            'name' => 'admin',
            'display_name' => 'Administrator',
            'description' => 'Administrador del sistema'
        ]);

        $user->roles()->save($role);

        $user2 = User::create([
            'name' => 'Katy',
            'email' => 'katy@gmail.com',
            'password' => '12345678'
        ]);

        $role2 = Role::create([
            'name' => 'auditor',
            'display_name' => 'Auditor',
            'description' => 'Auditor del sistema'
        ]);

        $user2->roles()->save($role2);
    }
}
