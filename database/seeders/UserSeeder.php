<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin123'),
                'role' => 'Admin'
            ],
            [
                'name' => 'operator',
                'email' => 'operator@gmail.com',
                'password' => Hash::make('operator123'),
                'role' => 'Operator'
            ],
            [
                'name' => 'member',
                'email' => 'member@gmail.com',
                'password' => Hash::make('member123'),
                'role' => 'Member'
            ]
        ]);
    }
}
