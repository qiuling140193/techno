<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelajaran extends Model
{
    protected $table = 'pelajaran';
	protected $primaryKey = 'id_pelajaran';

	public function kelas(){
      return $this->belongsTo('App\Kelas');
   }

   public function murid(){
		return $this->hasMany('App\Pelajaran', 'id_murid');
	}
}
