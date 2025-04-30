<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Services\EventService;

class EventController extends Controller
{
    public function __construct(private readonly EventService $eventService)
    {
    }

    public function __invoke(EventRequest $request)
    {
        $event = $this->eventService->createFromRequest($request->validated());

        return response()->json($request->validated());
    }
}
