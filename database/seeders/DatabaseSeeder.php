<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Role;


class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        
       // $this->call(UserSeeder::class);
      // $this->call(UserSeeder::class);
       Producto::factory(5)->create();
       Categoria::factory()->count(5)->create();
       Role::factory(5)->create();
    }
}
?>