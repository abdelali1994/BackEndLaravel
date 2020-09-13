<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'matricule','image','modele','couleur','boiteVitesses','type','doors','dispo','gps','bluetooth','airbags','coutParJour','nPlace','description'
    ];
    public function location()
    {
        return $this->hasOne('App\Location');
    }
}
