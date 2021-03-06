<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('produto_id')->comment('Produto');
            $table->unsignedInteger('user_id')->comment('Usuario que cadastrou a venda');
            $table->integer('qtd')->comment('Quantidade do produto');
            $table->timestamps();
            
            $table->foreign('produto_id')->references('id')->on('produtos');
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
        Schema::dropIfExists('vendas');
    }
}
