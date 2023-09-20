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
        Schema::create('portarias', function (Blueprint $table) {
            $table->id();
            $table->integer('numero')->unique();
            $table->integer('ano');
            $table->enum('visibilidade', ['Pública', 'Privada']);
            $table->date('publicacao');
            $table->enum('validade', ['Temporária', 'Permanente']);
            $table->date('data_validade')->nullable();
            $table->string('descricao');
            $table->string('arquivo');
            $table->string('integrantes_nao_servidores')->nullable();
            $table->boolean('ativa')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portarias');
    }
};
