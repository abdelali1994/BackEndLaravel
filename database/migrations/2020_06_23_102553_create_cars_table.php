<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('matricule');
            $table->string('marque');
            $table->string('image');
            $table->string('modele');
            $table->string('couleur');
            $table->string('boiteVitesses');
            $table->string('type');
            $table->string('doors');
            $table->boolean('dispo')->default(1) ;
            $table->boolean('gps')->default(1) ;
            $table->boolean('bluetooth')->default(1) ;
            $table->boolean('airbags')->default(1) ;
            // $table->boolean('public')->default(false);
            $table->string('coutParJour');
            $table->string('nPlace');
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}
