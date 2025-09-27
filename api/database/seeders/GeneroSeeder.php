<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genero;

class GeneroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $generos = ['Narrativo','No ficciión' ,'Poético','Dramático','Ensayo','Instructivo','Informativo', 'Investigación','infantil','Cristiano'];
        foreach ($generos as $genero) {
            Genero::create([ //id=1
                'nombre' => $genero
            ]);    
        }

    }
}
