<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'Siswa';
    protected $fillable = ['nama_belakang', 'nama_depan', 'jenis_kelamin', 'agama', 'alamat', 'foto', 'user_id'];

    public function getFoto()
    {
    	if(!$this->foto){
    		return asset('img/default.jpg');
    	}
    	return asset('img/'.$this->foto);
    }

    public function mapel()
    {
    	return $this->belongsToMany(Mapel::class)->withPivot(['nilai'])->withTimeStamps();
    }
}
