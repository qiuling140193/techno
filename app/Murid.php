<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Murid extends Model
{
    protected $table = 'murid';
	protected $primaryKey = 'id_murid';

	public function kelas(){
      return $this->belongsTo('App\Kelas');
   }

   public function Nilai(){
      return $this->belongsTo('App\Nilai');
   }
   public $timestamps = false;
   
}
