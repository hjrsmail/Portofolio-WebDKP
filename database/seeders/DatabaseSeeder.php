<?php

namespace Database\Seeders;
use App\Models\User;

use Illuminate\Support\Str;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'username' => 'testuser', // Tambahkan ini!
            'email_verified_at' => now(),
            'password' => bcrypt('password'), // atau password yang di-hash
            'remember_token' => Str::random(10),
        ]);
        
    }
}
