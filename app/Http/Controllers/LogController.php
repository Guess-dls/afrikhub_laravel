<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth; // ✅ Import de Auth
use LDAP\Result;
use PHPUnit\TextUI\XmlConfiguration\RemoveCacheResultFileAttribute;

class LogController extends Controller
{
    public function logout()
    {
        Auth::logout();

        // ✅ Supprimer la session actuelle (optionnel mais recommandé)
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        // ✅ Rediriger vers la page de connexion
        return redirect()->route('login');
    }

    

}



