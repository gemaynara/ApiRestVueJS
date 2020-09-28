<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovimentacaoContaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimentacao_conta', function (Blueprint $table) {
            $table->id();
            $table->integer('conta_id')->unsigned();
            $table->foreign('conta_id')->references('id')->on('conta');
            $table->char('tipo', 1); // S =  saque ou  D = deposito
            $table->double('valor');
            $table->date('data');
//            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movimentacao_conta');
    }
}
