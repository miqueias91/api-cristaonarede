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
        Schema::create('purchase', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('customers');
            $table->unsignedBigInteger('fornecedor_id');
            $table->foreign('fornecedor_id')->references('id')->on('suppliers');
            $table->unsignedBigInteger('tabela_preco_id');
            $table->foreign('tabela_preco_id')->references('id')->on('sellers');  
            $table->enum('status', ["PEDIDO", "ORCAMENTO", "BONIFICACAO/TROCA"]);
            $table->enum('situacao', ["PENDENTE", "CONCLUIDO", "SEPARADO", "FATURADO", "ENTREGUE", "PAGO"]);
            $table->string('observacao_cliente')->nullable();
            $table->string('forma_pagamento')->nullable();
            $table->string('condicao_pagamento')->nullable();
            $table->float('valor_frete', 8, 2)->nullable();
            $table->string('transportadora')->nullable();
            $table->date('emissao')->nullable();
            $table->date('previsao_entrega')->nullable();

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
        Schema::dropIfExists('purchase');
    }
};
