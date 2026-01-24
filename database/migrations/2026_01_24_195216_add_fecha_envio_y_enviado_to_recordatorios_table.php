<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('recordatorios', function (Blueprint $table) {
            $table->timestamp('fecha_envio')->after('mensaje');
            $table->boolean('enviado')->default(false)->after('fecha_envio');
        });
    }

    public function down(): void
    {
        Schema::table('recordatorios', function (Blueprint $table) {
            $table->dropColumn(['fecha_envio', 'enviado']);
        });
    }
};
