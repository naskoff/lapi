<?php

declare(strict_types=1);

namespace App\Templates\Messages;

use App\Templates\AbstractMessageTemplate;

class MessageTwo extends AbstractMessageTemplate
{
    public function getTemplateId(): string
    {
        return 'template-key-2';
    }
}
