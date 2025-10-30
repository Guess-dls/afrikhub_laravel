<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TokenMail;

class MailTestController extends Controller
{
    // Affiche le formulaire
    public function index()
    {
        return view('send-mail');
    }

    // Envoie le mail
    public function send(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        $user = (object) [
            'email' => $request->email,
            'name' => 'Test User',
            'token' => $request->message,
        ];

        try {
            Mail::to($user->email)->send(new TokenMail($user));
            return back()->with('success', 'Mail envoyé avec succès !');
        } catch (\Exception $e) {
            return back()->with('error', 'Erreur SMTP : ' . $e->getMessage());
        }
    }
}
