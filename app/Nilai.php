<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table = 'nilai';
	protected $primaryKey = 'id_nilai';

   public function pelajaran(){
      return $this->belongsTo('App\Pelajaran');
   }

   public function murid(){
      return $this->hasMany('App\Murid');
   }

   public function guru(){
      return $this->hasMany('App\Guru');
   }
}
