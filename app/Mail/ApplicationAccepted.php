<?php

namespace App\Mail;

use App\Models\Application;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApplicationAccepted extends Mailable
{
    use Queueable, SerializesModels;

    public $application;

    /**
     * Create a new message instance.
     *
     * @param Application $application
     * @return void
     */
    public function __construct(Application $application)
    {
        $this->application = $application;
        $this->logoUrl = 'https://pbs.twimg.com/profile_images/1800576061018603520/Dq3PMZGq_400x400.jpg';
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Votre candidature a été acceptée')
                    ->view('emails.application_accepted')
                    ->with([
                        'name' => $this->application->first_name,
                        'position' => $this->application->position->name,
                        'logoUrl' => $this->logoUrl, // Passe le logo à la vue
                    ]);
    }
}
