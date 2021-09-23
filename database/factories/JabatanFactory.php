<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Jabatan;
use Faker\Generator as Faker;

$factory->define(Jabatan::class, function (Faker $faker) {
    /* return [
        'nama_jabatan' => 'GA',
        'gaji_pokok' => 4750000,
        'tunjangan_jabatan' => 30000,
        'tunjangan_makan_perhari' => 20000,
        'tunjangan_transport_perhari' => 15000
    ]; */

    return [
        'nama_jabatan' => $faker->firstName('female'),
        'gaji_pokok' => 4750000,
        'tunjangan_jabatan' => 300000,
        'tunjangan_makan_perhari' => $faker->numberBetween(15000, 20000),
        'tunjangan_transport_perhari' => 15000
    ];
});
