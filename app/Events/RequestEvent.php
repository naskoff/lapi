<?php

namespace App\Events;

use App\Http\Requests\EventRequest;
use Illuminate\Foundation\Events\Dispatchable;

class RequestEvent
{
    use Dispatchable;

    public function __construct(public EventRequest $request)
    {
    }
}
