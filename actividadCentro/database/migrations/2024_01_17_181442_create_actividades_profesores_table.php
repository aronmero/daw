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
        Schema::create('actividades_profesores', function (Blueprint $table) {
            $table->foreignId('actividad_id')->references('id')->on('actividades')->onDelete('cascade');
            $table->foreignId('profesor_id')->references('id')->on('profesores')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actividades_profesores');
    }
};
