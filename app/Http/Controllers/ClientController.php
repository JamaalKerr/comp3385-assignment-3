<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    // Display the form
    public function create()
    {
        return view('clients.create');
    }

    // Handle the form submission
    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email',
            'telephone' => 'required|regex:/^\d{3}-\d{3}-\d{4}$/',
            'address' => 'required|string',
            'company_logo' => 'required|image|mimes:jpg,png|max:2048', // 2MB max
        ]);

        // Upload the company logo
        $path = $request->file('company_logo')->store('logos', 'public');

        // Save the client information
        Client::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'telephone' => $validated['telephone'],
            'address' => $validated['address'],
            'company_logo' => $path, // Save the file path
        ]);

        // Redirect with a success message
        return redirect('/dashboard')->with('success', 'Client created successfully!');
    }
}
