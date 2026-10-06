<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Seed the application's users.
     */
    public function run(): void
    {
        User::updateOrCreate(
            [
                'email' => 'terry@example.com',
            ],
            [
                'name' => 'Terry',
                'password' => Hash::make('terry'),
            ]
        );
    }
}