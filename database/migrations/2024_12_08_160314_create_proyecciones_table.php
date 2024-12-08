<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('proyecciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pelicula_id')->constrained();
            $table->foreignId('sala_id')->constrained();
            $table->timestamp('fecha_hora');
            $table->timestamps();
            $table->unique(['pelicula_id', 'sala_id', 'fecha_hora']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyecciones');
    }
};
