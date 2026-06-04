<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Andi Pratama',
                'email' => 'andi@gmail.com',
            ],
            [
                'name' => 'Siti Rahma',
                'email' => 'siti@gmail.com',
            ],
            [
                'name' => 'Budi Santoso',
                'email' => 'budi@gmail.com',
            ],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(
                ['email' => $user['email']],
                [
                    'name' => $user['name'],
                    'password' => Hash::make('password123'),
                ]
            );
        }
    }
}
