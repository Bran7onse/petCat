<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('historial_clinico', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mascota_id')->constrained()->onDelete('cascade');
            $table->date('fecha');
            $table->string('tipo'); // vacuna, consulta, tratamiento
            $table->text('descripcion')->nullable();
            $table->timestamps();
        });
    }
};
