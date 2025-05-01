<?php

declare(strict_types=1);

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;

class DataEvent
{
    use Dispatchable;

    public function __construct(
        private readonly string $id,
        private readonly string $name,
        private readonly int $competitionId,
        private readonly int $homeTeamId,
        private readonly int $awayTeamId,
        private readonly int $matchId,
    )
    {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCompetitionId(): int
    {
        return $this->competitionId;
    }

    public function getHomeTeamId(): int
    {
        return $this->homeTeamId;
    }

    public function getAwayTeamId(): int
    {
        return $this->awayTeamId;
    }

    public function getMatchId(): int
    {
        return $this->matchId;
    }
}
