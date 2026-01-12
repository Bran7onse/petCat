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
        Schema::create('mascotas', function (Blueprint $table) {
            $table->id();
            // Formulario de alta (Nombre, especie (Seleccionar entre gato o perro), raza, peso, foto)
            $table->string('nombre');
            $table->enum('especie', ['gato', 'perro']);
            $table->string('raza')->nullable();
            $table->float('peso')->nullable();
            $table->json('fotos')->nullable();

            // User propietario
            $table->foreignId('propietario_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mascotas');
    }
};
