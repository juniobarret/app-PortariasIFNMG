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
        Schema::create('portaria_servidores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('portaria_id')->constrained('portarias');
            $table->foreignId('servidor_id')->constrained('servidores');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portaria_servidores');
    }
};
