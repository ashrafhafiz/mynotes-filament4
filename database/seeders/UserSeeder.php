<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::firstOrCreate([
            'email' => 'admin@example.com',
        ], [
            'name' => 'System Administrator',
            'role' => UserRole::ADMIN->value,
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
        ]);

        User::firstOrCreate([
            'email' => 'user@example.com',
        ], [
            'name' => 'System User',
            'role' => UserRole::USER->value,
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
        ]);
    }
}
