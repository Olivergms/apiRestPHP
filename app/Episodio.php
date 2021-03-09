<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Episodio extends Model{

    public $timestamps = false;
    public $fillable =  ['temporada', 'numero', 'assistido', 'serie_id'];

    public function serie(){
        return $this->belongsTo(Serie::class);
    }

}
