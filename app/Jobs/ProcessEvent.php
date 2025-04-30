<?php

namespace App\Jobs;

use App\Http\Requests\EventRequest;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class ProcessEvent implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(private readonly EventRequest $request)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

    }
}
