<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class TokenMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    // On reçoit l'utilisateur pour accéder au token
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    // On construit le mail
    public function build()
    {
        return $this->subject('Vérification de votre compte')
            ->view('emails.token'); // La vue HTML à créer
    }
}
