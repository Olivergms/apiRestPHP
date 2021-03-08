<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Episodio extends Model{

    public $timestamps = false;
    public $filable =  ['temporada', 'numero', 'assistido'];

    public function serie(){
        return $this->belongsTo(Serie::class);
    }

}
