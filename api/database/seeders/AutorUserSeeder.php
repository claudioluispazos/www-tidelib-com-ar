<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AutorUser;

class AutorUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AutorUser::create([
            'autor_id' => 1,
            'user_id' => 1
        ]);
        AutorUser::create([
            'autor_id' => 1,
            'user_id' => 4
        ]);
        AutorUser::create([
            'autor_id' => 2,
            'user_id' => 2
        ]);
        AutorUser::create([
            'autor_id' => 2,
            'user_id' => 4
        ]);

    }
}
