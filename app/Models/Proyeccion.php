<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyeccion extends Model
{
    /** @use HasFactory<\Database\Factories\ProyeccionFactory> */
    use HasFactory;

    protected $table = 'proyecciones';

    public function pelicula() {
        return $this->belongsTo(Pelicula::class);
    }

    public function salas() {
        return $this->belongsTo(Sala::class);
    }

    public function entradas() {
        return $this->hasMany(Entrada::class);
    }
}
