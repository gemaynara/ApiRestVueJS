<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$faker = \Faker\Factory::create('pt_BR');

$factory->define(App\Correntista::class, function () use ($faker) {
    $genero = $faker->randomElement(['M', 'F']);
    return [

        'nome' => ($genero == 'F' ? $faker->firstNameFemale : $faker->firstNameMale) . ' ' . $faker->lastName,
        'cpf' => $faker->cpf,
        'genero' => $genero,
        'endereco' => $faker->streetAddress,
        'cidade' => $faker->city,
        'estado' => $faker->state,
        'nascimento' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'cep' => $faker->postcode,
        'email' => $faker->safeEmail,
        'telefone' => $faker->phoneNumber,
        'status' => 1,

    ];
});
