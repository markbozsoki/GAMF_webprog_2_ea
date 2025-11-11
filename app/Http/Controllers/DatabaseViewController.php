<?php

namespace App\Http\Controllers;

class DatabaseViewController extends Controller
{
    public function index()
    {   
        $header = ["col1", "col2", "col3"];
        $content = [];
        return view('database', compact('header'), compact('content'));
    }
}
