<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

class Event
{
    use Dispatchable, SerializesModels;

    /**
     * Create a new event instance.
     *
     *
     * @return void
     */
    public function __construct()
    {
    }
}

