<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Episodio extends Model{

    public $timestamps = false;
    protected $fillable =  ['temporada', 'numero', 'assistido', 'serie_id'];
    protected $appends = ['links'];

    public function serie(){
        return $this->belongsTo(Serie::class);
    }

    //pega o atributo "assistido" de fillable e transforma pra true ou false
    public function getAssistidoAttribute($assistido): bool{
        return $assistido;
    }


    public function getLinksAttribute(): array
    {
        return[
            "self" => '/api/series/' . $this->id,
            "serie" => '/api/series/' . $this->serie_id
        ];
    }

}
