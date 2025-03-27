<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Models\User;
use App\Notifications\NewUserRegistered;
use App\Notifications\ContactFormSubmission;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
            'App\Listeners\SendNewUserNotification',
        ],
        'App\Events\ContactFormSubmitted' => [
            'App\Listeners\SendContactFormNotification',
        ],
    ];

    // /**
    //  * Register any events for your application.
    //  */
    public function boot(): void
    {
        // Notify admins when a new user registers
        // Event::listen(Registered::class, function (Registered $event) {
        //     $admins = User::where('role','admin')->get();
            
        //     foreach ($admins as $admin) {
        //         $admin->notify(new NewUserRegistered($event->user));
        //     }
        // });
        Telescope::startRecording();
    }
}