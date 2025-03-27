<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Events\NewNotification;

class ContactFormSubmission extends Notification implements ShouldQueue
{
    use Queueable;

    protected $data;

    /**
     * Create a new notification instance.
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database', 'mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('New Contact Form Submission')
            ->line('You have received a new message from the contact form.')
            ->line('Name: ' . $this->data['name'])
            ->line('Email: ' . $this->data['email'])
            ->line('Subject: ' . $this->data['subject'])
            ->line('Message:')
            ->line($this->data['message'])
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'title' => 'New Contact Form Message',
            'message' => 'Message from ' . $this->data['name'] . ': ' . substr($this->data['message'], 0, 50) . '...',
            'data' => $this->data,
            'type' => 'contact_form'
        ];
    }

    /**
     * The callback that should be used to create the database notification.
     */
    public function databaseNotification($notifiable, $notification)
    {
        $databaseNotification = parent::databaseNotification($notifiable, $notification);
        
        // Broadcast the notification to the admin
        event(new NewNotification($databaseNotification));
        
        return $databaseNotification;
    }
}