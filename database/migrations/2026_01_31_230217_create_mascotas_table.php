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

            $table->string('nombre');
            $table->string('especie');
            $table->string('raza')->nullable();
            $table->decimal('peso', 8, 2); // 8 dígitos, 2 decimales

            // AGREGA ESTAS DOS LÍNEAS QUE FALTAN:
            $table->date('fecha_nacimiento')->nullable();
            $table->string('sexo')->nullable();

            // Tu relación con el usuario
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
