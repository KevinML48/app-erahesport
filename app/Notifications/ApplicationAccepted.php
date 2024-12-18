<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Application;

class ApplicationAccepted extends Notification
{
    protected $application;

    public function __construct(Application $application)
    {
        $this->application = $application;
    }

    public function via($notifiable)
    {
        return ['mail']; // Notification par email
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Votre candidature pour le poste de ' . $this->application->position->name . ' a été acceptée.')
                    ->action('Voir la candidature', url('/applications/' . $this->application->id))
                    ->line('Merci de votre intérêt !');
    }
}
