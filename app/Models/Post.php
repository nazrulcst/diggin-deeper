<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Events\PostCreateEvent;

class Post extends Model
{
    use HasFactory;

    protected $dispatchesEvents = [
        'created'=>PostCreateEvent::class,
    ];
}
