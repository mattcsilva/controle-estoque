<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemVendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_vendas', function (Blueprint $table) {
            $table->id();
            $table->decimal('custo');
            $table->integer('quantidade');
            $table->timestamps();
            $table->bigInteger('id_venda');
            $table->bigInteger('id_produto');

            $table->foreign('id_venda')
            ->references('id')
            ->onDelete('cascade')
            ->on('vendas');

            $table->foreign('id_produto')
            ->references('id')
            ->onDelete('cascade')
            ->on('produtos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_vendas');
    }
}
