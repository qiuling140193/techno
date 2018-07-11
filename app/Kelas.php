<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';
	protected $primaryKey = 'id_kelas';
	
	public function murid(){
		return $this->hasMany('App\Murid', 'id_murid');
	}
	public function pelajaran(){
		return $this->hasMany('App\Pelajaran', 'id_kelas');
	}

	public function guru(){
		return $this->hasMany('App\Guru', 'id_guru');
	}
}
