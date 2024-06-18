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
        $this->createUser('Alan', 'alan1@gmail.com', '12345678');
        $this->createUser('Alan', 'alan2@gmail.com', '12345678');
        $this->createUser('Alan', 'alan3@gmail.com', '12345678');
        $this->createUser('Alan', 'alan4@gmail.com', '12345678');
    }

    private function createUser(string $name, string $email, string $password): void
    {
        $usuario = new User();
        $usuario->name = $name;
        $usuario->email = $email;
        $usuario->password = Hash::make($password);
        $usuario->save();
    }

}
