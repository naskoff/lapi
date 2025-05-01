<?php

declare(strict_types=1);

namespace App\Templates;

interface MessageTemplateInterface
{
    public function getTemplateId(): string;
}
