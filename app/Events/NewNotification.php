<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewNotification implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $notificationData;

    /**
     * Create a new event instance.
     */
    public function __construct(array $notificationData)
    {
        $this->notificationData = $notificationData;
    }

    /**
     * Get the channels the event should broadcast on.
     */
    public function broadcastOn()
    {
        return new PrivateChannel('admin-notifications');
    }

    /**
     * Rename the event for Echo.
     */
    public function broadcastAs()
    {
        return '.NewNotification'; // Custom event name
    }


    /**
     * Define the data to send.
     */
    public function broadcastWith()
    {
        // \Log::info('Broadcasting event:', ['notification' => $this->notificationData]);
        return ['notification' => $this->notificationData];
    }
}

