<?php

namespace App\Http\Controllers;

use App\Models\Client;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch all clients from the database
        $clients = Client::all();

        // Pass the clients to the dashboard view
        return view('dashboard', compact('clients'));
    }
}
