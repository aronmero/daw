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
        Schema::create('seguidos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seguidor_id')->references('id')->on('usuarios')->onDelete('cascade');
            $table->foreignId('seguido_id')->references('id')->on('usuarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seguidos');
    }
};
