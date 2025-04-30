<?php

namespace App\Listeners;

use App\Events\RequestEvent;
use App\Jobs\ProcessEvent;

class RequestEventListener
{
    public function __construct()
    {
    }

    public function handle(RequestEvent $requestEvent): void
    {
        ProcessEvent::dispatch($requestEvent);
    }
}
