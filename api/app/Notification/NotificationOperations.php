<?php

namespace App\Notification;


class NotificationOperations
{
    public function __construct(){
    }

    public function add($entity){
        $entity->notify(new AddNotification($entity));
    }

    public function update($entity){
        $entity->notify(new UpdateNotification($entity));
    }

    public function delete($entity){
        $entity->notify(new DeleteNotification($entity));
    }
}