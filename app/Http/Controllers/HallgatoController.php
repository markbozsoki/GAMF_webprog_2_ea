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
        //
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
        if ($request->osztondij == "1") {
            $hallgato = Hallgato::updateOrCreate([
                'id' => $request->h_id,
            ],
            [
                'nev' => $request->name,
                'osztondijas' => $request->osztondij,
                'kar_id' => $request->kar,
            ]);
        }
        else {
            $hallgato = Hallgato::updateOrCreate([
                'id' => $request->h_id,
            ],
            [
                'nev' => $request->name,
                'osztondijas' => "0",
                'kar_id' => $request->kar,
            ]);
        }
        return redirect()->route('hallgato.index')->with('success', 'Updated');
    }

    public function destroy(string $id): RedirectResponse
    {
        $hallgato = Hallgato::where('id', $id)->first();
        $hallgato->delete();

        return redirect()->route('hallgato.index')->with('success', 'Deleted');
    }
}
