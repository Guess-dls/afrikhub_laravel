<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
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
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/',
                'confirmed',
            ],
        ], [
            'email.required' => 'L\'adresse email est obligatoire.',
            'email.string'   => 'L\'adresse email doit être une chaîne de caractères.',
            'email.email'    => 'Le format de l\'adresse email est invalide.',
            'email.max'      => 'L\'adresse email ne doit pas dépasser 255 caractères.',
            'email.unique'   => 'Cet email est déjà utilisé.',
            'password.required'   => 'Le mot de passe est obligatoire.',
            'password.string'     => 'Le mot de passe doit être une chaîne de caractères.',
            'password.min'        => 'Le mot de passe doit contenir au moins 8 caractères.',
            'password.mixedCase'  => 'Le mot de passe doit contenir des majuscules et des minuscules.',
            'password.numbers'    => 'Le mot de passe doit contenir au moins un chiffre.',
            'password.symbols'    => 'Le mot de passe doit contenir au moins un symbole.',
            'password.confirmed'  => 'La confirmation du mot de passe ne correspond pas.',
        ])->validate();

        $utilisateur = User::create([
            'name' => $input['nom'],
            'email' => $input['email'],
            'contact' => $input['contact'],
            'token' => md5(uniqid() . $input['email']),
            'type_compte' => $input['type_compte'],
            'statut' => 'inactif', // Bloqué tant que l'email n'est pas vérifié
            'password' => Hash::make($input['password']),
        ]);

        // Envoi du mail avec le token
        \Illuminate\Support\Facades\Mail::to($utilisateur->email)->send(new \App\Mail\TokenMail($utilisateur));

        // Ne pas connecter l'utilisateur automatiquement
        // Retour vers la page de connexion avec message
        session()->flash('success', 'Inscription réussie ! Veuillez vérifier votre email pour activer votre compte.');
        redirect()->route('login')->send();

        return $utilisateur;
    }
}
