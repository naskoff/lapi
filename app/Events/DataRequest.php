<?php

declare(strict_types=1);

namespace App\Events;

use App\Templates\MessageTemplateInterface;
use Illuminate\Foundation\Events\Dispatchable;

class DataRequest
{
    use Dispatchable;

    public function __construct(
        private readonly array $users,
        private readonly MessageTemplateInterface $messageTemplate,
    )
    {
    }

    /**
     * @return string[]
     */
    public function getUsers(): array
    {
        return $this->users;
    }

    /**
     * @return MessageTemplateInterface
     */
    public function getMessageTemplate(): MessageTemplateInterface
    {
        return $this->messageTemplate;
    }
}
