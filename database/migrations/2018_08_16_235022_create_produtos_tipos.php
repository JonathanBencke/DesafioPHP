<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutosTipos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos_tipos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 100)->comment('Nome do tipo de produto');
            $table->decimal('imposto', 3, 2)->comment('Valor percentual do imposto aplicado no tipo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos_tipos');
    }
}
