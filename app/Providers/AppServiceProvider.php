<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use Illuminate\Http\Request;

class FortifyServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Vue d'inscription
        Fortify::registerView(function () {
            return view('auth.register'); // ta vue d'inscription
        });

        // Créer utilisateur
        Fortify::createUsersUsing(CreateNewUser::class);

        // Authentification personnalisée pour bloquer les utilisateurs inactifs
        Fortify::authenticateUsing(function (Request $request) {
            $user = \App\Models\User::where('email', $request->email)->first();

            if (
                $user &&
                \Illuminate\Support\Facades\Hash::check($request->password, $user->password)
            ) {

                // Bloquer la connexion si l'utilisateur n'est pas actif
                if ($user->statut !== 'actif') {
                    return null; // Connexion refusée
                }

                return $user; // Connexion autorisée
            }

            return null;
        });
    }
}
