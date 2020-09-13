<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LocationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
  
            $data['id']  = $this->id;
            $data['dateLocation']  = $this->dateLocation;
            $data['dateDebut']  = $this->dateDebut;
            $data['dateFin']  = $this->dateFin;
            $data['montant']  = $this->montant;
            // $data['user']  = $this->user;
            $data['car']  = $this->car;

           return $data;
         
          
    
    }
}
