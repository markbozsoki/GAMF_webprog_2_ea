<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class MessagesController extends Controller
{
    public function showMessages()
    {
        if (!auth()->check()) {
            return redirect('/login')->with('error', 'Jelentkezz be az üzenetek megtekintéséhez!');
        }

        $messages = DB::table('messages')
            ->orderBy('timestamp', 'desc')
            ->get();

        return view('messages', compact('messages'));
    }
}
