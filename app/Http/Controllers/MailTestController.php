<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SimpleMail;

class MailTestController extends Controller
{
    // Affiche le formulaire
    public function index()
    {
        return view('sendmail'); // garde ta vue telle quelle
    }

    // Envoie le mail
    public function send(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        try {
            Mail::to($request->email)->send(new SimpleMail($request->message));
            return back()->with('success', 'Mail envoyé avec succès !');
        } catch (\Exception $e) {
            return back()->with('error', 'Erreur SMTP : ' . $e->getMessage());
        }
    }
}
