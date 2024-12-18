<?php

namespace App\Mail;

use App\Models\Application;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApplicationRejected extends Mailable
{
    use Queueable, SerializesModels;

    public $application;

    public function __construct(Application $application)
    {
        $this->application = $application;
        $this->logoUrl = 'https://pbs.twimg.com/profile_images/1800576061018603520/Dq3PMZGq_400x400.jpg'; // URL du logo
    }

    public function build()
    {
        return $this->subject('Candidature Rejetée')
                    ->view('emails.application_rejected')
                    ->with([
                        'first_name' => $this->application->first_name,
                        'position' => $this->application->position->name,
                        'logoUrl' => $this->logoUrl, // Passe le logo à la vue
                    ]);
    }
}
