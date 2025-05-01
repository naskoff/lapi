<?php

declare(strict_types=1);

namespace App\Listeners;

use App\Events\DataEvent;
use App\Events\DataRequest;
use App\Templates\Messages\MessageOne;
use App\Templates\Messages\MessageTwo;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class DataEventListener implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(DataEvent $event): void
    {
        $messageTemplate = match ($event->getName()) {
            'one' => new MessageOne(),
            'two' => new MessageTwo(),
        };

        $users = array_keys(array_flip(array_merge(
            [],
            \Cache::get("{$event->getCompetitionId()}:competition") ?? [],
            \Cache::get("{$event->getHomeTeamId()}:competitor") ?? [],
            \Cache::get("{$event->getAwayTeamId()}:match") ?? [],
        )));

        event(new DataRequest(users: $users, messageTemplate: $messageTemplate));
    }
}
