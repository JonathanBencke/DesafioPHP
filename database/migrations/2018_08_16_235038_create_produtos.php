<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('produto_tipo_id')->comment('Tipo do produto');
            $table->unsignedInteger('user_id')->comment('Usuario que cadastrou o produto');
            $table->string('nome', 100)->comment('Nome do produto');
            $table->decimal('valor', 8, 2)->comment('Valor do produto');
            $table->timestamps();
            
            $table->foreign('produto_tipo_id')->references('id')->on('produtos_tipos');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
}
