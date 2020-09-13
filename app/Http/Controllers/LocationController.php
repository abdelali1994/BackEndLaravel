<?php

namespace App\Http\Controllers;

use App\Car;
use App\Http\Requests\StoreLocationRequest;
use App\Http\Resources\LocationResource;
use App\Location;
use DateTime;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations=Location::all();
        // return $locatoins[0]->user;
        return LocationResource::collection($locations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(StoreLocationRequest $request)
    public function store(Request $request)
    {
        $car=Car::findOrFail($request->car_id);
        $dateD=new DateTime($request->dateDebut);
        $dateF=new DateTime($request->dateFin);
        $jours=date_diff($dateF,$dateD);
        // $prixTTC=$car->coutParJour*$jours->format('%d');
        $prixTTC=$car->coutParJour*$jours->format('%d');
        
        $location=Location::create([
            // 'user_id'=>auth()->user()->id,
            // 'user_id'=>Auth::user()->id,
            // 'user_id'=>10,
            'user_id'=>$request->user_id,
            'car_id'=>$request->car_id,
            'dateLocation'=>new DateTime(),
            'dateDebut'=>$request->dateDebut,
            'dateFin'=>$request->dateFin,
            // 'montant'=>$request->montant,
            'montant'=>$prixTTC
        ]);
        // $location= new Location();
        // $location->user_id=auth()->user()->id;
        // $location->car_id=$request->car_id;
        // $location->dateLocation=new DateTime();
        // // $location->dateLocation=new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
        // $location->dateDebut=$request->dateDebut;
        // $location->dateFin=$request->dateFin;
        // $location->montant=$prixTTC;
        $car->update([
             'dispo'=> 0,
         ]);

         $location->save();
        
        return $location ;
        // return $location->with(['success'=>'Commande ajoutée']) ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    // public function show(Location $location)
    public function show($id)
    {

        // $location=Location::findOrFail($id);
        // // return $locatoins[0]->user;
        // return LocationResource::collection($location);
        return  new LocationResource(Location::findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Location $location)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function delete( $id)
    {
        $location=Location::find($id)->delete();
        
    }
    // public function destroy(Location $location)
    // {
    //     //
    // }
}
