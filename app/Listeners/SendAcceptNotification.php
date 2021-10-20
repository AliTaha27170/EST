<?php

namespace App\Listeners;

use App\Events\AcceptUser;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendAcceptNotification
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
     * @param  AcceptUser  $event
     * @return void
     */
    public function handle(AcceptUser $event)
    {
        //
    }
}
