<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $fillable = [
    'nombrecompleto',
    'promedio',
    'edad',
    'fecha_nacimiento'
];
}
