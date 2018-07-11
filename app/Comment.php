<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';
	protected $primaryKey = 'id_comment';
	
	public function murid(){
		return $this->hasMany('App\Murid', 'id_murid');
	}
	public function guru(){
		return $this->hasMany('App\Guru', 'id_guru');
	}

	
}
