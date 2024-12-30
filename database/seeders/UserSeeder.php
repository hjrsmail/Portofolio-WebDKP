<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'email' => 'admin@hijir.id',
                'username' => 'hjrsmail',
            ],
        ];

        foreach ($users as $user) {
            User::where('email', $user['email'])
                ->update(['username' => $user['username']]);
        }
    }
}
