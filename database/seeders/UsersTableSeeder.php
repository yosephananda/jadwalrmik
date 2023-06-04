<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            //Admin
            [
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@test.com',
                'password' => Hash::make('admintest123'),
                'role' => 'admin',
            ],
            //Dosen
            [
                'name' => 'Dosen',
                'username' => 'dosen',
                'email' => 'dosen@test.com',
                'password' => Hash::make('dosentest123'),
                'role' => 'dosen',
            ],
            //User
            [
                'name' => 'User',
                'username' => 'user',
                'email' => 'user@test.com',
                'password' => Hash::make('usertest123'),
                'role' => 'user'
            ]
        ]);
    }
}
