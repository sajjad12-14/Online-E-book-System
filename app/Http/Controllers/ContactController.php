<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // ==========================
    // Store Contact Message
    // ==========================
    public function store(Request $request)
    {

        $request->validate([

            'full_name' => 'required|max:255',

            'email' => 'required|email|max:255',

            'phone' => 'required|max:20',

            'subject' => 'required|max:255',

            'message' => 'required',

        ]);

        Contact::create([

            'full_name' => $request->full_name,

            'email' => $request->email,

            'phone' => $request->phone,

            'subject' => $request->subject,

            'message' => $request->message,

            'status' => 0,

        ]);

        return back()->with(
            'success',
            'Your message has been sent successfully.'
        );
    }
}
