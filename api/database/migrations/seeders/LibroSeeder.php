<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Libro;

class LibroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Libro::create([
            'titulo' =>'Las Flores De Ilia',
            'isbn' => '900-345-4553',
            'idioma' => 'Español',
            'precio' => '12.232',
            'imagen_portada' => 'las _flores _de _ilia.jpeg',
            'autor_id' => '1',
            'genero_id' => '1',
            'editorial_id' => '1',  
            'sinopsis' => 'El origen de la palabra “sinopsis” se remonta al antiguo griego, pues está formada por los vocablos syn– (“de manera conjunta”) y opsis (“visión” o “ver”). Esto quiere decir que una sinopsis es, en principio, una visión de conjunto, una panorámica de todo el asunto, a la que se puede acudir de manera rápida y general. Por ello suelen ser textos breves y muy concisos, o sea, que van directo al grano y en los que no suelen abundar ni los detalles ni los datos muy específicos.'
        ]);
        Libro::create([ 
            'titulo' =>'Hombres como Dioses',
            'isbn' => '900-345-4552',
            'idioma' => 'Español',
            'precio' => '12.232',
            'imagen_portada' => 'hombres como dioses_5.jpg',
            'autor_id' => '2',
            'genero_id' => '2',
            'editorial_id' => '1',  
            'sinopsis' => 'El origen de la palabra “sinopsis” se remonta al antiguo griego, pues está formada por los vocablos syn– (“de manera conjunta”) y opsis (“visión” o “ver”). Esto quiere decir que una sinopsis es, en principio, una visión de conjunto, una panorámica de todo el asunto, a la que se puede acudir de manera rápida y general. Por ello suelen ser textos breves y muy concisos, o sea, que van directo al grano y en los que no suelen abundar ni los detalles ni los datos muy específicos.'
        ]);
        Libro::create([ //id=1
            'titulo' =>'Cada Historia Cuenta',
            'isbn' => '900-345-4555',
            'idioma' => 'Español',
            'precio' => '12.232',
            'imagen_portada' => 'cada historia cuenta_2.jpg',
            'autor_id' => '1',
            'genero_id' => '1',
            'editorial_id' => '1',  
            'sinopsis' => 'El origen de la palabra “sinopsis” se remonta al antiguo griego, pues está formada por los vocablos syn– (“de manera conjunta”) y opsis (“visión” o “ver”). Esto quiere decir que una sinopsis es, en principio, una visión de conjunto, una panorámica de todo el asunto, a la que se puede acudir de manera rápida y general. Por ello suelen ser textos breves y muy concisos, o sea, que van directo al grano y en los que no suelen abundar ni los detalles ni los datos muy específicos.'
        ]);
        Libro::create([ 
            'titulo' => 'El Misterio del Oso',
            'isbn' => '900-345-4559',
            'idioma' => 'Español',
            'precio' => '12.232',
            'imagen_portada' => 'las _flores _de _ilia.jpeg',
            'autor_id' => '1',
            'genero_id' => '1',
            'editorial_id' => '1',  
            'sinopsis' => 'El origen de la palabra “sinopsis” se remonta al antiguo griego, pues está formada por los vocablos syn– (“de manera conjunta”) y opsis (“visión” o “ver”). Esto quiere decir que una sinopsis es, en principio, una visión de conjunto, una panorámica de todo el asunto, a la que se puede acudir de manera rápida y general. Por ello suelen ser textos breves y muy concisos, o sea, que van directo al grano y en los que no suelen abundar ni los detalles ni los datos muy específicos.'
        ]);
        Libro::create([ 
            'titulo' => 'Atlantis',
            'isbn' => '900-345-4559',
            'idioma' => 'Español',
            'precio' => '12.232',
            'imagen_portada' => 'atlantis_1.jpg',
            'autor_id' => '1',
            'genero_id' => '1',
            'editorial_id' => '1',  
            'sinopsis' => 'El origen de la palabra “sinopsis” se remonta al antiguo griego, pues está formada por los vocablos syn– (“de manera conjunta”) y opsis (“visión” o “ver”). Esto quiere decir que una sinopsis es, en principio, una visión de conjunto, una panorámica de todo el asunto, a la que se puede acudir de manera rápida y general. Por ello suelen ser textos breves y muy concisos, o sea, que van directo al grano y en los que no suelen abundar ni los detalles ni los datos muy específicos.'
        ]);
        Libro::create([ 
            'titulo' => 'El Cuerpo Secreto',
            'isbn' => '900-345-4559',
            'idioma' => 'Español',
            'precio' => '12.232',
            'imagen_portada' => 'el cuerpo secreto 2_3.jpg',
            'autor_id' => '2',
            'genero_id' => '3',
            'editorial_id' => '1',  
            'sinopsis' => 'El origen de la palabra “sinopsis” se remonta al antiguo griego, pues está formada por los vocablos syn– (“de manera conjunta”) y opsis (“visión” o “ver”). Esto quiere decir que una sinopsis es, en principio, una visión de conjunto, una panorámica de todo el asunto, a la que se puede acudir de manera rápida y general. Por ello suelen ser textos breves y muy concisos, o sea, que van directo al grano y en los que no suelen abundar ni los detalles ni los datos muy específicos.'
        ]);
        Libro::create([ 
            'titulo' => 'Hasta que el verano se Acabe',
            'isbn' => '900-345-4559',
            'idioma' => 'Español',
            'precio' => '12.232',
            'imagen_portada' => 'hasta que el verano se acabe_4.jpg',
            'autor_id' => '2',
            'genero_id' => '2',
            'editorial_id' => '1',  
            'sinopsis' => 'El origen de la palabra “sinopsis” se remonta al antiguo griego, pues está formada por los vocablos syn– (“de manera conjunta”) y opsis (“visión” o “ver”). Esto quiere decir que una sinopsis es, en principio, una visión de conjunto, una panorámica de todo el asunto, a la que se puede acudir de manera rápida y general. Por ello suelen ser textos breves y muy concisos, o sea, que van directo al grano y en los que no suelen abundar ni los detalles ni los datos muy específicos.'
        ]);
    }
}
