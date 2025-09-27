<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Gabriel Sanchez',
            'email' => 'kitogab.sanchez@gmail.com',
            'password' => '12345678',
            'tipo_usuario' => 0
        ]);
        User::create([
            'name' => 'autor',
            'email' => 'autor@gmail.com',
            'password' => '12345678'
        ]);
        User::create([
            'name' => 'Usuario',
            'email' => 'usuario@gmail.com',
            'password' => '12345678'
        ]);
        User::create([
            'name' => 'Claudio Pazos',
            'email' => 'claudioluispazos@gmail.com',
            'password' => '12345678',
            'tipo_usuario' => 1
        ]);
    }
}
