<?php

declare(strict_types=1);

namespace App\Listeners;

use App\Events\DataRequest;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class DataRequestListener implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(DataRequest $event): void
    {
        $messageTemplate = $event->getMessageTemplate();

        $data = [
            'template_id' => $messageTemplate->getTemplateId(),
        ];

        foreach (array_chunk($event->getUsers(), 20_000) as $chunk) {
            $body = $data;
            $body['users'] = $chunk;
            $body['total'] = count($chunk);

            \Http::asJson()
                ->baseUrl('https://mpbfe9523bce1a3da8cb.free.beeceptor.com')
                ->withHeader('Authorization', 'Key secret-key')
                ->withHeader('Content-Type', 'application/json')
                ->post('/notifications', $body);
        }
    }
}
