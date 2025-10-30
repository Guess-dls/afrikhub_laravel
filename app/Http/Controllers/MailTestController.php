<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailTestController extends Controller
{
    // Affiche le formulaire
    public function index()
    {
        return view('sendmail');
    }

    // Envoie le mail
    public function send(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        try {
            Mail::send([], [], function ($mail) use ($request) {
                $mail->to($request->email)
                    ->subject('Message depuis le formulaire')
                    ->html(
                        '<p>Vous avez reçu le message suivant :</p>
                        <p>' . htmlspecialchars($request->message) . '</p>
                        <p>Merci,<br>' . config('app.name') . '</p>'
                    );
            });

            return back()->with('success', 'Mail envoyé avec succès !');
        } catch (\Exception $e) {
            return back()->with('error', 'Erreur SMTP : ' . $e->getMessage());
        }
    }
}
