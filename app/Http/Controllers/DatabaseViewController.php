<?php

namespace App\Http\Controllers;

use App\Models\Hallgato;

class DatabaseViewController extends Controller
{
    public function index()
    {   
        $header = ["col1", "col2", "col3"];
        $content = Hallgato::with(['kar', 'masolas'])->get();

        return view('database', compact('header'), compact('content'));
    }
}
