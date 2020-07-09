<?php

namespace App\Notification;


class AddNotification extends NotificationController
{
    protected $appNotification;

    public function __construct($appNotification){
        $this->appNotification = $appNotification;
    }
}