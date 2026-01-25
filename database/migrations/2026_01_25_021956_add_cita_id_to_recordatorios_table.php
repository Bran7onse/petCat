<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('recordatorios', function (Blueprint $table) {
            $table->foreignId('cita_id')
                ->nullable()
                ->constrained()
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('recordatorios', function (Blueprint $table) {
            $table->dropForeign(['cita_id']);
            $table->dropColumn('cita_id');
        });
    }
};
