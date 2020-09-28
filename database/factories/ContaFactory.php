<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$faker = \Faker\Factory::create('pt_BR');


$factory->define(App\Conta::class, function () use ($faker){
    return [
        'correntista_id'=> rand(1,100),
        'agencia' =>$faker->numerify('####-#'),
        'numero_conta' => $faker->numerify('######-#'),
        'tipo_conta' => $faker->randomElement(['C', 'P']),
        'saldo' => $faker->randomFloat(2,0,8),
        'status' => 1,

    ];
});
