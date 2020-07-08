<?php

namespace App\Notification;


use Illuminate\Broadcasting\Channel;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Redis;

class UpdateNotification extends Notification
{
    use Queueable;
    protected $appNotification;

    public function __construct($appNotification){
        $this->appNotification = $appNotification;
    }

    public function via($notifiable){
        return ['database', 'broadcast'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'id' => $this->appNotification->id,
            'name' => $this->appNotification->name,
        ];
    }

    public function toBroadcast($notifiable)
    {
        $count = Redis::get('count');
        $count = $count + 1;
        Redis::set('count', $count);
        return [
            'count' => $count
        ];
    }

    public function broadcastOn()
    {
        return new Channel('notification_channel');
    }
}