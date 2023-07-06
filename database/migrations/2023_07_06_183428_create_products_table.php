<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fornecedor_id');
            $table->foreign('fornecedor_id')->references('id')->on('suppliers');            
            $table->string('nome')->nullable();
            $table->string('marca')->nullable();
            $table->string('categoria')->nullable();
            $table->enum('grades', ["XG", "GG", "G", "M", "P"]);
            $table->string('observacao')->nullable();
            $table->string('codigo_barra')->nullable();
            $table->string('ncm')->nullable();
            $table->enum('embalagem', ["CX", "DZ", "UN", "KG", "PC", "EMB", "MT"])->nullable();
            $table->string('referencia')->nullable();
            $table->float('ipi', 8, 2)->nullable();
            $table->float('peso', 8, 2)->nullable();
            $table->float('qtd_embalagem', 8, 2)->nullable();
            $table->float('estoque', 8, 2)->nullable();
            $table->float('venda', 8, 2)->nullable();
            $table->float('comissao', 8, 2)->nullable();
            $table->float('custo', 8, 2)->nullable();
            $table->float('estoque_minimo', 8, 2)->nullable();
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
        Schema::dropIfExists('products');
    }
};
