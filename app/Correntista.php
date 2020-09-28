<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Correntista extends Model
{
    protected $table = 'correntista';
    protected $fillable = [
        'nome',
        'cpf',
        'genero',
        'nascimento',
        'cep',
        'endereco',
        'complemento',
        'cidade',
        'estado',
        'email',
        'telefone',
        'status',
    ];

    public function contas()
    {
        return $this->hasMany('App\Conta', 'id');
    }
}
