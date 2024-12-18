<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApplicationConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $application;
    public $logoUrl;

    /**
     * Create a new message instance.
     *
     * @param  \App\Models\Application  $application
     * @return void
     */
    public function __construct($application)
    {
        $this->application = $application;
        $this->logoUrl = 'https://pbs.twimg.com/profile_images/1800576061018603520/Dq3PMZGq_400x400.jpg'; // URL du logo
    }

    /**
     * Build the message.
     *
     * @return \Illuminate\Mail\Mailable
     */
    public function build()
    {
        return $this->subject('Confirmation de candidature')
                    ->view('emails.application_confirmation')
                    ->with([
                        'first_name' => $this->application->first_name,
                        'last_name' => $this->application->last_name,
                        'logoUrl' => $this->logoUrl, // Passe le logo à la vue
                    ]);
    }
}
