<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'dateLocation','dateDebut','dateFin','montant','user_id','car_id'
    ];
    public function car()
    {
        return $this->belongsTo('App\Car');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
