<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Resources extends Model
{
    use SoftDeletes;
    use Notifiable;
    protected $table = 'resources';

    protected $fillable = [
        'id', 'name'
    ];

    protected $hidden = [
        'deleted_at'
    ];
}