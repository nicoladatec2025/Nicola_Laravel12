<?php

// database/migrations/20250101000000createcursostable.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('slug')->unique();
            $table->text('descricao')->nullable();
            $table->string('imagem')->nullable();
            $table->decimal('preco', 10, 2)->default(0);
            $table->string('nivel')->nullable(); // iniciante, intermediário, avançado
            $table->string('categoria')->nullable();
            $table->boolean('ativo')->default(true);
            $table->unsignedInteger('carga_horaria')->default(0); // em horas
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('cursos');
    }
};

