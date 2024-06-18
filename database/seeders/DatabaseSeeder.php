<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;
use App\Models\Categoria;


class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        
       // $this->call(UserSeeder::class);
      // $this->call(UserSeeder::class);
       Producto::factory(30)->create();
       Categoria::factory(10)->create();
    }
}



    /**
     * 
     * Seed the application's database.
     */
    // public function run(): void
    // {
    //     // \App\Models\User::factory(10)->create();

    //     // \App\Models\User::factory()->create([
    //     //     'name' => 'Test User',
    //     //     'email' => 'test@example.com',
    //     // ]);

    //     User::factory(10)->create();
    //     Categoria::factory(10)->create();
    //     Producto::factory(10)->create();

    // }