<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'System Admin',
            'role' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('123456')
        ]);

        User::create([
            'name' => 'Andrew Carnegie',
            'role' => 'tenant',
            'email' => 'andrew.carnegie@gmail.com',
            'password' => Hash::make('123456')
        ]);

        User::create([
            'name' => 'John Doe',
            'role' => 'agent',
            'email' => 'john.doe@gmail.com',
            'password' => Hash::make('123456')
        ]); 
        
        User::create([
            'name' => 'Harry Styles',
            'role' => 'landlord',
            'email' => 'harry.styles@gmail.com',
            'password' => Hash::make('123456')
        ]); 

        User::create([
            'name' => 'James Blunt',
            'role' => 'provider',
            'email' => 'james.blunt@gmail.com',
            'password' => Hash::make('123456')
        ]); 
    }
}
