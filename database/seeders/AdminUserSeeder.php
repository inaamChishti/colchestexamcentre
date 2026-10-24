<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@colchesterexamcentre.co.uk'],
            [
                'name' => 'Centre Administrator',
                'password' => Hash::make('Admin@12345'),
                'is_admin' => true,
            ]
        );
    }
}
