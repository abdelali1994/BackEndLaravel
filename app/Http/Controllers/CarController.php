<?php

namespace App\Http\Controllers;

use App\Car;
use App\Http\Requests\storeCarRaquest;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $cars=Car::all();
        $cars=Car::paginate(3);
        // return $locatoins[0]->user;
        return response()->json($cars);
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
    public function store(storeCarRaquest $request)

    {

        // $this->validate($request,[

        //     'matricule'=>'required',
        //     'modele'=>'required',
        //     'marque'=>'required',
        //     'couleur'=>'required',
        //     'boiteVitesses'=>'required',
        //     'type'=>'required',
        //     'doors'=>'required',
        //     'coutParJour'=>'required',
        //     'nPlace'=>'required',
        //     'description'=>'required',
        //     'dispo'=>'required',
        //     'gps'=>'required',
        //     'bluetooth'=>'required',
        //     'airbags'=>'required',
        //     'image'=>'required',
    
        //   ]);
          
        //   $name='';
   
        //       $file=$request->file('image');
        //       $name=$file->getClientOriginalName();
        //       $file->move(public_path('image'),$name);
      
        //   Car::create([

        //     'matricule'=>$request->matricule,
        //     'modele'=>$request->modele,
        //     'couleur'=>$request->couleur,
        //     'boiteVitesses'=>$request->boiteVitesses,
        //     'type'=>$request->type,
        //     'doors'=>$request->doors,
        //     'coutParJour'=>$request->coutParJour,
        //     'nPlace'=>$request->nPlace,
        //     'description'=>$request->description,
        //     'dispo'=>$request->dispo,
        //     'gps'=>$request->gps,
        //     'bluetooth'=>$request->bluetooth,
        //     'airbags'=>$request->airbags,
        //     'image'=>'image/'.$name,
        //   ]);
          $car = new Car();
          $car->matricule=$request->matricule;
          $car->modele=$request->modele;
          $car->couleur=$request->couleur;
          $car->boiteVitesses=$request->boiteVitesses;
          $car->marque=$request->marque;
          $car->type=$request->type;
          $car->doors=$request->doors;
          $car->coutParJour=$request->coutParJour;
          $car->nPlace=$request->nPlace;
          $car->description=$request->description;
          $car->dispo=$request->dispo;
          $car->gps=$request->gps;
          $car->bluetooth=$request->bluetooth;
          $car->airbags=$request->airbags;
          $car->image=$request->image;
          $car->save();
          
          return $car;
        //   $car->matricule=$request['matricule'];
        //   $car->modele=$request['modele'];
        //   $car->couleur=$request['couleur'];
        //   $car->boiteVitesses=$request['boiteVitesses'];
        //   $car->doors=$request['doors'];
        //   $car->coutParJour=$request['coutParJour'];
        //   $car->nPlace=$request['nPlace'];
        //   $car->description=$request['description'];
        //   $car->dispo=$request['dispo'];
        //   $car->gps=$request['gps'];
        //   $car->bluetooth=$request['bluetooth'];
        //   $car->airbags=$request['airbags'];
        //   $car->image=$request['image'];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    // public function show(Car $car)
    public function show($id)
    {
        $car = Car::findOrFail($id);
        return $car;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        //
    }
}
