<?php

namespace Database\Seeders;

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
        \App\Models\User::factory()->create([
            'name' => 'ahdan abde rifai',
            'email' => 'ahdan.abde@gmail.com',
            'telepon' => '08983660660',
            'alamat' => 'Sumberagung, Jetis, Bantul',
            'role' => 'admin',
            'password' => Hash::make('11111111'),
        ]);
    }
}
