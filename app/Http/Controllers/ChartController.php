<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function showChart()
    {
        $sub = DB::table('hallgatos')
            ->join('kars', 'hallgatos.kar_id', '=', 'kars.id')
            ->join('masolas', 'masolas.hallgato_id', '=', 'hallgatos.id')
            ->select(
                'hallgatos.id as hallgato_id',
                'hallgatos.kar_id',
                'kars.nev as kar_nev',
                'kars.kvota',
                'hallgatos.osztondijas',
                DB::raw('SUM(masolas.oldal) as total_oldal')
            )
            ->groupBy('hallgatos.id', 'hallgatos.kar_id', 'kars.nev', 'kars.kvota', 'hallgatos.osztondijas');

        $data = DB::table(DB::raw("({$sub->toSql()}) as hallgato_sub"))
            ->mergeBindings($sub)
            ->select(
                'kar_nev',
                DB::raw('SUM(CASE WHEN osztondijas = 1 THEN LEAST(total_oldal, kvota) ELSE 0 END) as ingyenes_oldal'),
                DB::raw('SUM(CASE WHEN osztondijas = 1 THEN GREATEST(total_oldal - kvota, 0) ELSE 0 END) + SUM(CASE WHEN osztondijas = 0 THEN total_oldal ELSE 0 END) as fizetos_oldal')
            )
            ->groupBy('kar_nev')
            ->orderBy('kar_nev', 'asc')
            ->get();

        $labels = $data->pluck('kar_nev');
        $freePage = $data->pluck('ingyenes_oldal');
        $paidPage = $data->pluck('fizetos_oldal');

        return view('chart', compact('labels', 'freePage', 'paidPage'));
    }
}
