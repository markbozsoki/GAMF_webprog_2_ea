<?php

namespace App\Http\Controllers;

use App\Models\Hallgato;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class HallgatoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hallgatok = Hallgato::all();
        $hallgato = array();
        return view('CRUD', compact('hallgato'), compact('hallgatok'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hallgato = new Hallgato();
        $hallgato->nev = "Példa Elek";
        $hallgato->osztondijas = 0;
        $hallgato->kar_id = 7;
        $hallgato->save();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $hallgato = new Hallgato();
        $hallgato->nev = "Példa Elek";
        $hallgato->osztondijas = 0;
        $hallgato->kar_id = 7;
        return redirect()->route('hallgato.index')->with('success', 'Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $hallgato = Hallgato::where('id', $id)->first();
        $hallgatok = Hallgato::all();
        return view('CRUD', compact('hallgato'), compact('hallgatok'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $hallgato = Hallgato::where('id', $id)->first();
        $hallgato->nev = "Példa Elemér";
        $hallgato->osztondijas = 1;
        $hallgato->kar_id = 2;
        $hallgato->save();
    
        return redirect()->route('hallgato.index')->with('success', 'Updated');
    }

    public function destroy(string $id): RedirectResponse
    {
        $hallgato = Hallgato::where('id', $id)->first();
        $hallgato->delete();

        return redirect()->route('hallgato.index')->with('success', 'Deleted');
    }
}
