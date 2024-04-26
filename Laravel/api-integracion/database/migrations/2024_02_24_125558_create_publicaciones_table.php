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
        Schema::create('publicaciones', function (Blueprint $table) {
            $table->id('id');
            $table->string('imagen');
            $table->string('titulo',30);
            $table->string('descripcion',150);
            $table->foreignId('tipo_id')->references('id')->on('tipo_publicaciones');
            $table->datetime('fecha_publicacion');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->boolean('activo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publicaciones');
    }
};
