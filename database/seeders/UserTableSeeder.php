<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'shopname' => '',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'status' => '1',
            ],

            [
                'name' => 'Merchant One',
                'email' => 'merchant1@gmail.com',
                'shopname' => 'shop one',
                'password' => Hash::make('merchant1'),
                'role' => 'merchant',
               'status' => '1',
            ],

            [
                'name' => 'User',
                'email' => 'user@gmail.com',
                'shopname' => '',
                'password' => Hash::make('user123'),
                'role' => 'user',
               'status' => '1',
            ]

        ]
            );
    }
}
