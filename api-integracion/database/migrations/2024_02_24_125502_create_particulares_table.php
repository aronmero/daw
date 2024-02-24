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
        Schema::create('particulares', function (Blueprint $table) {
            $table->foreignId('usuario_id')->references('id')->on('usuarios');
            $table->string('primer_apellido',50);
            $table->string('segundo_apellido',50);
            $table->char('sexo');
            $table->date('fecha_nacimiento');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('particulares');
    }
};
