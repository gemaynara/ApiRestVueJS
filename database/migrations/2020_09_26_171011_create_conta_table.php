<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conta', function (Blueprint $table) {
            $table->id();
            $table->integer('correntista_id')->unsigned();
            $table->foreign('correntista_id')->references('id')->on('correntista');
            $table->string('agencia');
            $table->string('numero_conta')->unique();
            $table->char('tipo_conta', '1'); // C- Corrente P- Poupança
            $table->double('saldo');
            $table->boolean('status'); // 1- ativo 0 - inativo
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
        Schema::dropIfExists('conta');
    }
}
