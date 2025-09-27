<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Autor;

class AutorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Autor::create([ //id=1
            'id' =>'1',
            'nombre' => 'Gabriel',
            'apellido' => 'Sanchez',
            'email' => 'kitogab.sanchez@gmail.com',
            'nacionalidad' => 'argentina'
        ]);
        Autor::create([ //id=2
            'id' =>'2',
            'nombre' => 'autor',
            'apellido' => 'generico',
            'email' => 'autor@gmail.com',
            'nacionalidad' => 'uruguaya'
        ]);
    }
}
