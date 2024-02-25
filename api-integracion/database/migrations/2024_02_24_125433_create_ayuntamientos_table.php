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
        Schema::create('ayuntamientos', function (Blueprint $table) {
            $table->foreignId('usuario_id')->references('id')->on('usuarios');
            $table->string('direccion');
            $table->foreignId('tokenVerification')->references('id')->on('tokens');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ayuntamientos');
    }
};
