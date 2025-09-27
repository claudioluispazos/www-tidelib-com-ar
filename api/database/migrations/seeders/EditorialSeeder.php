<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Editorial;

class EditorialSeeder extends Seeder
{
   
      public function run(): void
    {
        //
        Editorial::create([
            'razon_social' => 'Tinta De Luz',
            'denominacion_social' => 'Tinta De Luz',
            'cuit' => '19.232.987',
            'email' => 'ingo@tintadeluz.com.ar',
            'direccion' => 'San Juan 3456 / Godoy Cruz-Mendoza',
            'sitio_web' => 'www.tintadeluz.com.ar',
            'facebook' => 'tintadeluz',
            'instagram' => '@tintadeluz'
        ]);
        }
}