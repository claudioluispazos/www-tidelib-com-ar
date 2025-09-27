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
        Schema::create('libros', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('isbn');
            $table->string('idioma');
            $table->double('precio');
            $table->string('imagen_portada');
            $table->foreignId('autor_id')->constrained();
            $table->foreignId('genero_id')->constrained();
            $table->foreignId('editorial_id')->constrained();
            $table->text('sinopsis');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libros');
    }
};
