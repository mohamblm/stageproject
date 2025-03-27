<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password123'),
                'nom' => 'Doe',
                'prenom' => 'John',
                'phone' => '1234567890',
                'role' => 'admin',
                'status' => 'individuel',
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Client User',
                'email' => 'client@example.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password123'),
                'nom' => 'Smith',
                'prenom' => 'Jane',
                'phone' => '0987654321',
                'role' => 'client',
                'status' => 'entreprise',
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
