<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Siswa;
use Faker\Generator as Faker;

$factory->define(Siswa::class, function (Faker $faker) {
	$faker->addProvider(new \Mmo\Faker\PicsumProvider($faker));
    return [
        'nama_depan' => $faker->firstName,
        'nama_belakang' =>$faker->lastName,
        'jenis_kelamin' =>$faker->randomElement(['L', 'P']),
        'agama' => $faker->randomElement(['islam', 'kristen', 'katolik', 'hindu', 'buddha']),
        'alamat' => $faker->city,
        'foto' => $faker->picsum('public/img', 400, 400, false)
    ];
});
