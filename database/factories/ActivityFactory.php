<?php

use Faker\Generator as Faker;

$factory->define(App\Activity::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->randomElement([
            'Cine',
            'Correr',
            'Escribir',
            'Leer',
            'Pensar',
            'Volar'          
        ])
    ];
});
