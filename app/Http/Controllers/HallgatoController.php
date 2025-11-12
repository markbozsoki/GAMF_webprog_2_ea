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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        if($request->h_id == "-1") {
            $hallgato = new Hallgato();
            $hallgato->nev = $request->name;
            $hallgato->kar_id = $request->kar;
            $hallgato->osztondijas = $request->osztondij;
            $hallgato->save();
        } else {
            $hallgato = new Hallgato();
            $hallgato->nev = "TEST TEST";
            $hallgato->kar_id = $request->kar;
            $hallgato->osztondijas = $request->osztondij;
            $hallgato->save();
        }

        return redirect()->route('hallgato.index')->with('success', 'Updated');
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
        //
    }

    public function destroy(string $id): RedirectResponse
    {
        $hallgato = Hallgato::where('id', $id)->first();
        $hallgato->delete();

        return redirect()->route('hallgato.index')->with('success', 'Deleted');
    }
}
