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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id('idCliente');
            $table->string('nome', 100);
            $table->string('cpf', 45)->unique();
            $table->date('data_nascimento');
            $table->string('telefone', 45);
            $table->string('email', 80)->unique();
            $table->date('data_cadastro');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
