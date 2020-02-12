<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'Siswa';
    protected $fillable = ['nama_belakang', 'nama_depan', 'jenis_kelamin', 'agama', 'alamat', 'foto'];
}
