<?php

namespace App\Models;


use Illuminate\Notifications\DatabaseNotification;

class Notifications extends DatabaseNotification
{
    protected $table = 'notifications';
}