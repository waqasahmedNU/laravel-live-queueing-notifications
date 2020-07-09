<?php

namespace App\Notification;


class DeleteNotification extends NotificationController
{
    protected $appNotification;

    public function __construct($appNotification){
        $this->appNotification = $appNotification;
    }
}