<?php

namespace App\Listeners;

use App\Events\WizkidFired;

class SendEmailOnWizkidFire
{
    /**
     * Handle the event.
     *
     * @param  \App\Events\WizkidFired  $event
     * @return void
     */
    public function handle(WizkidFired $event)
    {
        $wizkid = $event->wizkid;

        $wizkid->notify(new \App\Notifications\WizkidFired($wizkid));
    }
}
