<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    /** @use HasFactory<\Database\Factories\EntradaFactory> */
    use HasFactory;

    public function proyeccion() {
        return $this->belongsTo(Proyeccion::class);
    }
}
