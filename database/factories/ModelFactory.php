<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->safeEmail.".sink.sparkpostmail.com",
        'verified' => false,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->defineAs(App\User::class, 'verified', function ($faker) use ($factory) {
    $user = $factory->raw(App\User::class);

    return array_merge($user, ['verified' => TRUE]);
});


$factory->define(App\Subscription::class, function () {
    return [
        'name' => 'MAILING_LIST',
    ];
});

$factory->defineAs(App\Subscription::class, 'subscribed', function ($faker) use ($factory) {
    $subscription = $factory->raw(App\Subscription::class);

    return array_merge($subscription, ['subscribed' => TRUE]);
});

$factory->defineAs(App\Subscription::class, 'unsubscribed', function ($faker) use ($factory) {
    $subscription = $factory->raw(App\Subscription::class);

    return array_merge($subscription, ['subscribed' => FALSE]);
});
