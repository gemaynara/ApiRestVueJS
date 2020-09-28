<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
    protected $table = 'conta';
    protected $fillable = [
        'correntista_id',
        'agencia',
        'numero_conta',
        'tipo_conta',
        'saldo',
        'status'
    ];
}
