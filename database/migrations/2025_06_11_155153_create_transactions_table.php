<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('descricao');
            $table->enum('tipo', ['entrada', 'saida'])->index();
            $table->decimal('valor', 15, 2);
            $table->dateTime('data_transacao')->index();
            $table->string('categoria')->nullable()->index();
            $table->string('metodo_pagamento')->nullable();
            $table->string('referencia')->nullable();
            $table->text('observacao')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};