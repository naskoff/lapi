<?php

declare(strict_types=1);

namespace App\Services;

class EventService
{
    public function __construct(
        public int $id,
        public string $name,
    )
    {
    }

    public function createFromRequest(array $request): self
    {
        return new self(
            id: $request['event']['id'],
            name: $request['event']['name'],
        );
    }
}
