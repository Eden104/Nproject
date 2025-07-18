<?php

namespace App\Http\Controllers;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function store(Request $request ){
        $validated= $request->validate([
            'fullname' => 'required|string|max:100',
            'email' => 'required|email|unique:'.(new Client)->getTable().',email',
            'password' => 'required|string|min:6',
        ]);

        Client::create([
            'fullname' => $validated['fullname'],
            'email'=> $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('signup')->with('success', 'Client enregistré avec succès!');
    }
}
