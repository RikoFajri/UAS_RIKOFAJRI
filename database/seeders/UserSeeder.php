<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert user 1
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'rikospensix688@gmail.com',
            'password' => Hash::make('123'),
        ]);

       
    }
}
