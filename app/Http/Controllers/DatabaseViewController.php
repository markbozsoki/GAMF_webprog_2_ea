<?php

namespace App\Http\Controllers;

use App\Models\Hallgato;

class DatabaseViewController extends Controller
{
    public function index()
    {   
        $header = ["Név", "Térítés", "Kar", "Kari kvóta [oldal]", "Másolt mennyiség [oldal]", "Egyoldalas másolas [db]", "Kétoldalas másolas [db]", "Kvóta túllépés", "Önköltséges nyomtatás [oldal]", "Kvóta kihasználtság [%]"];
        $sources = Hallgato::with(['kar', 'masolas'])->get();
        
        $content = array();
        foreach($sources as $source) {
            $nev = $source->nev;
            

            $kar = $source->kar->nev;
            $kvota = $source->kar->kvota;
            
            $masolas_count = 0;
            $ketoldalas_count = 0;
            $egyoldalas_count = 0;
            foreach($source->masolas as $masolas) {
                $lap_count = $masolas->lap;
                $lap_multiplier = $masolas->oldal;
                if($lap_multiplier == 2) {
                    $ketoldalas_count += $lap_count;
                } else {
                    $egyoldalas_count += $lap_count;
                }
                $masolas_count += $lap_count * $lap_multiplier;
            }

            if($source->osztondijas == 1) {
                $terites = "osztondijas";
                if($masolas_count > $kvota) {
                    $kvota_tullepes = "igen";
                    $tullepes_merteke = ($masolas_count - $kvota);
                } else {
                    $kvota_tullepes = "nem";
                    $tullepes_merteke = 0;
                }
            } else { # önköltségesek esetében nincs kvóta alapú térítés
                $terites = "önköltséges";
                $kvota_tullepes = "-";
                $tullepes_merteke = $masolas_count;
            }
            
            $kihasznaltsag = ($kvota * 0.0001) * $masolas_count;

            array_push($content, [$nev, $terites, $kar, $kvota, $masolas_count, $egyoldalas_count, $ketoldalas_count, $kvota_tullepes, $tullepes_merteke, $kihasznaltsag]);
        }
        
        return view('database', compact('header'), compact('content'));
    }
}
