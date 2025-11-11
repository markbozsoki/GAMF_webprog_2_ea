<?php

namespace App\Http\Controllers;

use App\Models\Hallgato;

class DatabaseCRUDController extends Controller
{
    public function create()
    {
        $hallgato = new Hallgato();
        $hallgato->nev = "Példa Elek";
        $hallgato->osztondijas = 0;
        $hallgato->kar_id = 7;
    }

    public function read()
    {
        foreach (Hallgato::all() as $hallgato) {
            echo $hallgato->nev."<br>";
            echo $hallgato."<br>";
        }
    }

    public function update()
    {
        $hallgato = Hallgato::where('nev', "Példa Elek")->first();
        $hallgato->nev = "Példa Elemér";
        $hallgato->osztondijas = 1;
        $hallgato->kar_id = 2;
    }

    public function delete()
    {
        $hallgato = Hallgato::where('nev', "Példa Elemér")->first();
        $hallgato->delete();
    }
} 
