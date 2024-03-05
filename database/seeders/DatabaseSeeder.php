<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product;
use App\Models\Categori;
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

        \App\Models\User::factory(20)->create();
        \App\Models\Pelanggan::factory(20)->create();
        // \App\Models\Categori::factory()->count(10)->create();

        // Product::factory()->create([
        //     'name' => 'Kabel Data Type C',
        //     'harga_beli' => 20000,
        //     'harga_jual' => 20000,
        //     'stock' => 100,
        //     'id_categori' => 2,
        // ]);
    }
}
