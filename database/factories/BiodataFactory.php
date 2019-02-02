<?php

use Faker\Generator as Faker;

$factory->define(App\Biodata::class, function (Faker $faker) {
    return [
        'nama_siswa' => $faker->name,
        'alamat_siswa' => $faker->address
    ];
});
