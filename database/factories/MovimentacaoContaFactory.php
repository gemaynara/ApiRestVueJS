<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;


$faker = \Faker\Factory::create('pt_BR');


$factory->define(App\MovimentacaoConta::class, function () use ($faker){
    return [
        'conta_id'=> rand(1,100),
        'tipo'=> $faker->randomElement(['D', 'S']),
        'valor'=> $faker->randomFloat(2,0,8),
        'data'=> $faker->date('Y-m-d'),
    ];
});
