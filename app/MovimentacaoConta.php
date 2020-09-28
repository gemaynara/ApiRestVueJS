<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MovimentacaoConta extends Model
{
    protected $table = 'movimentacao_conta';
    public $timestamps = false;
    protected $fillable = [
        'conta_id',
        'tipo',
        'valor',
        'data'
    ];

    public function contas()
    {
        return $this->hasMany('App\Conta', 'id');
    }
}
