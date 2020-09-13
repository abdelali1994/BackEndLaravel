<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeCarRaquest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'matricule'=>'required',
            'modele'=>'required',
            'marque'=>'required',
            'couleur'=>'required',
            'boiteVitesses'=>'required',
            'type'=>'required',
            'doors'=>'required',
            'coutParJour'=>'required',
            'nPlace'=>'required',
            'description'=>'required',
            'dispo'=>'required',
            'gps'=>'required',
            'bluetooth'=>'required',
            'airbags'=>'required',
            'image'=>'required',
        ];
    }
}
