<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function show(Request $request)
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:50',
            'subject' => 'required|string|max:50',
            'body' => 'required|string|max:500',
        ]);

        $message = DB::table('messages')->insert(
            [
                'timestamp' => date("Y-m-d H:i:s"),
                'email' => $request->email,
                'subject' => $request->subject,
                'message' => $request->body,
            ]
        );

        return view('contact')->with('success', 'Sent');
    }
}
