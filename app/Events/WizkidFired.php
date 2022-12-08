<?php

namespace App\Events;

use App\Models\Wizkid;
use Illuminate\Queue\SerializesModels;

class WizkidFired
{
    use SerializesModels;

    public Wizkid $wizkid;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Wizkid $wizkid)
    {
        $this->wizkid = $wizkid;
    }
}
