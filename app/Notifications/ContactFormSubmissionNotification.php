<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactFormSubmissionNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct($formSubmission)
    {
        $this->formSubmission = $formSubmission;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toDatabase(object $notifiable): array
    {
        return [
            'title' => 'New contact form Submission',
            'message' => 'You have a new contact form submission from ' . $this->formSubmission->first_name . ' ' . $this->formSubmission->last_name,
        ];
    }

    public function toArray(object $notifiable): array
    {
        return [
            'title' => 'New contact form Submission',
            'message' => 'You have a new contact form submission from ' . $this->formSubmission->first_name . ' ' . $this->formSubmission->last_name,
        ];
    }
}
