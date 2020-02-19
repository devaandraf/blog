<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Siswa;

class TabelSiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    //     \App\Siswa::create([
    //     	'nama_depan' => str_random(20),
    //     	'nama_belakang' => str_random(20),
    //     	'jenis_kelamin' => 'L',
    //     	'agama' => 'islam',
    //     	'alamat' => str_random(50),
    //     	'gambar' => 'a.jpg'
        // ]);

        factory(\App\Siswa::class, 5)->create();
    }
}
