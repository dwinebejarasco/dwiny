<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // This is where you call other seeders.
        // The order matters for foreign key constraints!
        // UserStatusSeeder and RoleSeeder should run before UserSeeder.
        $this->call([
            RoleSeeder::class,           // Make sure this exists and runs first if Users depend on roles
            UserStatusSeeder::class,     // Make sure this exists and runs first if Users depend on user statuses
            UserSeeder::class,           // This is where your 'admin' user creation code should be
            // Add any other seeders here that you create later, e.g., CustomerSeeder::class,
        ]);

        // You can uncomment and use these if you want to create test users via factories
        // but typically your specific users (like admin) go into dedicated seeders.
        // User::factory(10)->create();
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
