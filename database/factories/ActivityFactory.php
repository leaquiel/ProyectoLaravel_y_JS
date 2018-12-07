<?php

use Faker\Generator as Faker;

$factory->define(App\Activity::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->randomElement([
            'Kayak',
            'Vuelo de bautismo',
            'Trekking',
            'Salir con amigos',
            'Salto bungee',
            'Mountain Bike',
            'Estudiar buenas practicas :)',
            'Ir al casino',
            'Esquiar',
            'Pescar',
            'Nadar',
            'Jugar al Golf',
            'Jugar al Tenis',
            'Partido de Futbol',
            'Ir a la Disco'
        ]),
        'detail' => $faker->text,
    ];
});
