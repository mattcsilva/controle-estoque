<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendas', function (Blueprint $table) {
            $table->id();
            $table->decimal('valor_total');
            $table->timestamps();
            $table->bigInteger('id_cliente');
            $table->bigInteger('id_vendedor');

            $table->foreign('id_cliente')
            ->references('id')
            ->onDelete('cascade')
            ->on('clientes');

            $table->foreign('id_vendedor')
            ->references('id')
            ->onDelete('cascade')
            ->on('vendedors');
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
