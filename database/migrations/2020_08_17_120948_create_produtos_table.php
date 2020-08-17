<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->text('descricao');
            $table->enum('unidade_medida', ['m2', 'cm', 'UN', 'kg', 'l', 'X']);
            $table->decimal('custo');
            $table->timestamps();
            $table->bigInteger('id_fornecedor');

            $table->foreign('id_fornecedor')
            ->references('id')
            ->onDelete('cascade')
            ->on('fornecedors');
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
