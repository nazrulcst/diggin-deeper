<?php

namespace App\Listeners;

use App\Events\UserProfileViewNotify;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UserProfileViewNotificationSend
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\UserProfileViewNotify  $event
     * @return void
     */
    public function handle(UserProfileViewNotify $event)
    {
        return $event->data['name'] .'  '. $event->data['email'];
    }
}
