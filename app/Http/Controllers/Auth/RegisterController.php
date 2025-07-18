<?php

namespace App\Http\Controllers\Auth;
use App\Models\User; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class RegisterController extends Controller
{
    
    public function showRegistrationForm()
    {
        
        if (Auth::check()) {
            return redirect()->route('lay23accueil');
        }
        
        return view('auth.register'); 
    }

    
    public function register(Request $request)
    {
        $validated = $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|unique:users', // Vérifie l'unicité dans la table users
            'terms' => 'accepted', // Vérifie que l'utilisateur accepte les conditions d'utilisation
            'password' => 'required|min:8|confirmed' // Nécessite password_confirmation

        ]);

        $user = User::create([
            'name' => $validated['fullname'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']), // Hachage sécurisé
        ]);

        //  Connexion automatique
        Auth::login($user);

        //  Redirection
        return redirect()->route('lay23accueil')->with('success', 'Inscription réussie !');
    }
}
