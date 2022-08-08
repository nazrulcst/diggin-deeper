<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Events\PostRetrivedEvent;
use App\Events\PostCreateEvent;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title','description'];

    protected $dispatchesEvents = [
        'retrieved'=>PostCreateEvent::class,
        'created'=>PostCreateEvent::class,
    ];
}
