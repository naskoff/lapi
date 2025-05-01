<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Events\DataEvent;
use App\Http\Requests\EventRequest;

class EventController extends Controller
{
    public function __invoke(EventRequest $request)
    {
        $event = $request->validated();

        event(new DataEvent(
            id: $event['event']['id'],
            name: $event['event']['name'],
            competitionId: $event['competition_id'],
            homeTeamId: $event['home_team_id'],
            awayTeamId: $event['away_team_id'],
            matchId: $event['match_id'],
        ));

        return response()->json($request->validated());
    }
}
