<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorrentistaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('correntista', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('cpf','14')->unique();
            $table->char('genero', 1); // F ou M
            $table->date('nascimento');
            $table->string('cep', '9');
            $table->string('endereco', '500');
            $table->string('cidade', '30');
            $table->string('estado');
            $table->string('email');
            $table->string('telefone', '14');
            $table->boolean('status');  // 1 Ativo 2 Inativo
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
        Schema::dropIfExists('correntista');
    }
}
