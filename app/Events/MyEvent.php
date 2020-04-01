<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MyEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;

    /**
     * Create a new event instance.
     *
     * @param $message string
     */
    public function __construct()
    {
        $this->message = now();
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
//        return
    $d= new PrivateChannel('my-channel');
    dd($d);
        return $d;
//        return new PrivateChannel('channel-name');
//        return ['my-channel'];
//        return new PrivateChannel('order.'.$this->update->order_id);

    }

    public function broadcastAs()
    {
        return 'my-event';
    }
}
