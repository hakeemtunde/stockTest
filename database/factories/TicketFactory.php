<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Ticket;
use Faker\Generator as Faker;

$factory->define(Ticket::class, function (Faker $faker) {
    return [
        'topic' => $faker->colorName(),
        'message' => $faker->sentence,
        'status' => 'PENDING',
        'user_id'=> 1
    ];
});
