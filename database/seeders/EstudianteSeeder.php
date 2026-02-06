<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstudianteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
public function run(): void
{
    \App\Models\Estudiante::create([
        'nombrecompleto' => 'Lorreany Escorihuela',
        'promedio' => 10.0,
        'edad' => 19,
        'fechadenacimiento' => '2006-05-15'
    ]);

    \App\Models\Estudiante::create([
        'nombrecompleto' => 'Pablo Castillo',
        'promedio' => 9.2,
        'edad' => 19,
        'fechadenacimiento' => '2006-07-21'
    ]);

    \App\Models\Estudiante::create([
        'nombrecompleto' => 'Dino REX',
        'promedio' => 9.5,
        'edad' => 19,
        'fechadenacimiento' => '2006-11-07'
    ]);
}
}
