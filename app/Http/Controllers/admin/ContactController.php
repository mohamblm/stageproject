<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller; 
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller 
{
    public function index()
{
    $contacts = Contact::latest()->paginate(15);
    return view('admin.contacts.index', compact('contacts'));
}
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required'
        ]);

        Contact::create($validated);

        return redirect()->back()->with('success', 'Message envoyé avec succès!');
    }
}