<?php

namespace App\Notification;


class UpdateNotification extends NotificationController
{

    protected $appNotification;

    public function __construct($appNotification){
        $this->appNotification = $appNotification;
    }
}