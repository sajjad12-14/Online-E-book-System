<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class AdminContactController extends Controller
{
    // ==========================
    // Contact List
    // ==========================
    public function index(Request $request)
    {
        $search = $request->search;

        $contacts = Contact::when($search, function ($query) use ($search) {

            $query->where('full_name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->orWhere('subject', 'like', "%{$search}%");

        })
            ->latest()
            ->paginate(10);

        return view(
            'Admin.contacts.index',
            compact('contacts', 'search')
        );
    }

    // ==========================
    // View Message
    // ==========================
    public function show($id)
    {
        $contact = Contact::findOrFail($id);

        // Mark as Read
        $contact->status = 1;
        $contact->save();

        return view(
            'Admin.contacts.show',
            compact('contact')
        );
    }

    // ==========================
    // Delete Message
    // ==========================
    public function delete($id)
    {
        $contact = Contact::findOrFail($id);

        $contact->delete();

        return back()->with(
            'success',
            'Message Deleted Successfully'
        );
    }
}
