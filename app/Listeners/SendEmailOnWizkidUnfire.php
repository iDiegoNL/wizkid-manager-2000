<?php

namespace App\Listeners;

use App\Events\WizkidUnfired;

class SendEmailOnWizkidUnfire
{
    /**
     * Handle the event.
     *
     * @param \App\Events\WizkidUnfired $event
     * @return void
     */
    public function handle(WizkidUnfired $event)
    {
        $wizkid = $event->wizkid;

        $wizkid->notify(new \App\Notifications\WizkidUnfired($wizkid));
    }
}
