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
        Schema::create('mascota_fotos', function (Blueprint $table) {
            $table->id();

            // ESTA ES LA COLUMNA QUE TE FALTA:
            $table->foreignId('mascota_id')->constrained('mascotas')->onDelete('cascade');

            $table->string('url'); // Para guardar la ruta de la foto

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mascota_fotos');
    }
};
