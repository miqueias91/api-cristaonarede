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
        Schema::create('purchase_item', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('compra_id');
            $table->foreign('compra_id')->references('id')->on('purchase');
            $table->unsignedBigInteger('produto_id');
            $table->foreign('produto_id')->references('id')->on('products');
            $table->enum('grades', ["XG", "GG", "G", "M", "P"]);
            $table->enum('embalagem', ["CX", "DZ", "UN", "KG", "PC", "EMB", "MT"])->nullable();
            $table->string('observacao')->nullable();
            $table->float('preco_bruto', 8, 2)->nullable();
            $table->float('qtd_embalagem', 8, 2)->nullable();
            $table->float('percentual_desconto_acrescimo', 8, 2)->nullable();
            $table->float('preco_liquido', 8, 2)->nullable();
            $table->float('preco_custo', 8, 2)->nullable();
            $table->float('quantidade', 8, 2)->nullable();

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
        Schema::dropIfExists('purchase_item');
    }
};
