<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    
    public function showLoginForm()
    {
        // Si déjà connecté, redirige vers l'accueil
        if (Auth::check()) {
            return redirect()->route('lay23accueil');
        }
        
        return view('Auth.login'); 
    }

    
    public function login(Request $request)
{
    // 1. Validation des champs
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:6'
    ]);

    // 2. Tentative de connexion
    if (Auth::attempt($credentials)) {
        $request->session()->regenerate(); // Sécurité contre les attaques

        // 3. Vérification email + mot de passe pour l'admin
        $user = Auth::user();
        $adminEmail = 'admin@example.com'; // Remplace par le vrai email de l'admin
        $adminPlainPassword = 'motdepasseadmin'; // Remplace par le vrai mot de passe clair

        if (
            $user->email === $adminEmail &&
            Hash::check($adminPlainPassword, $user->password)
        ) {
            return redirect()->route('admin.dashboard');
        }

        // Sinon, redirection normale
        return redirect()->route('lay23accueil');
    }

    // 4. Si échec, retour avec erreur
    return back()->withErrors([
        'email' => 'Email ou mot de passe incorrect',
    ])->onlyInput('email');
}
    
    public function logout(Request $request)
    {
        Auth::logout(); // Termine la session
        $request->session()->invalidate(); // Nettoie la session
        $request->session()->regenerateToken(); // Nouveau token CSRF
        return redirect()->route('accueil'); // Retour à l'accueil1
    }
}