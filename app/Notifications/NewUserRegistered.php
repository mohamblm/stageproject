<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\User;
use App\Events\NewNotification;

class NewUserRegistered extends Notification implements ShouldQueue
{
    use Queueable;

    protected $user;

    /**
     * Create a new notification instance.
     */
    public function __construct(User $user)
    {
        $this->user = $user;
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
            ->subject('New User Registration')
            ->line('A new user has registered on your platform.')
            ->line('Name: ' . $this->user->name)
            ->line('Email: ' . $this->user->email)
            ->action('View User', url('/users/' . $this->user->id))
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
            'title' => 'New User Registration',
            'message' => 'User ' . $this->user->name . ' has registered',
            'user_id' => $this->user->id,
            'type' => 'user_registration'
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