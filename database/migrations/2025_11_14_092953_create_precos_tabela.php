<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('precos', function (Blueprint $table) {
        $table->id();
        $table->string('item');          // Nome do item
        $table->decimal('valor', 10, 2); // Valor com duas casas decimais
        $table->text('descricao');       // Descrição detalhada
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('precos');
    }
};
