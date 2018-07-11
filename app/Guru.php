<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'guru';
	protected $primaryKey = 'id_guru';
	
	public function comment(){
		return $this->hasMany('App\Comment', 'id_comment');
	}

	public function nilai(){
		return $this->hasMany('App\Nilai', 'id_nilai');
	}

	public $timestamps = false;
}
