<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User; // Make sure you have this line to use the User model
use Illuminate\Support\Facades\Hash; // Make sure you have this line for Hash::make()

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Your user creation code goes HERE
        $users = [
            [
                'first_name' => 'Admin',
                'last_name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'),
                'role_id' => 1,
                'user_status_id' => 1,
            ],
            // You can add other default users here if needed
        ];

        foreach($users as $user){
            User::create($user);
        }
    }
}