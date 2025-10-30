<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Illuminate\Support\Facades\Mail;
use App\Mail\TokenMail;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
            ],
        ])->validate();

        // Création de l'utilisateur avec statut "inactif"
        $utilisateur = User::create([
            'name' => $input['nom'] ?? $input['email'],
            'email' => $input['email'],
            'contact' => $input['contact'] ?? null,
            'type_compte' => $input['type_compte'] ?? 'user',
            'statut' => 'inactif', // ← clé pour bloquer la connexion
            'token' => md5(uniqid() . $input['email']),
            'password' => Hash::make($input['password']),
        ]);

        // Envoi du mail de validation
        Mail::to($utilisateur->email)->send(new TokenMail($utilisateur));

        // On ne fait pas Auth::login($utilisateur)
        return $utilisateur;
    }
}
