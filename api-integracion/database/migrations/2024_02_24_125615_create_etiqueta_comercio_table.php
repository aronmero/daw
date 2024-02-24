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
        Schema::create('etiqueta_comercio', function (Blueprint $table) {
            $table->foreignId('usuario_id')->references('usuario_id')->on('comercios')->onDelete('cascade');
            $table->foreignId('etiqueta_id')->references('id')->on('etiquetas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etiqueta_comercio');
    }
};
