<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
            $data['user_id']  = $this->id;
            $data['first_name']  = $this->first_name;
            $data['last_name']  = $this->last_name;
            $data['email']  = $this->email;
            $data['phone']  = $this->phone;
            $data['cin']  = $this->cin;
            $data['addresse']  = $this->addresse;
            $data['avatar']  = $this->avatar;
            $data['locations']  = LocationResource::collection($this->locations);

           return $data;
    }
}
