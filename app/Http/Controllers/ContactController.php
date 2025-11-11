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
