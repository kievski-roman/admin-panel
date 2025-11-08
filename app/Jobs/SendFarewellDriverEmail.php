<?php

namespace App\Jobs;

use App\Models\Driver;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class SendFarewellDriverEmail implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public Driver $driver
    )
    {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
    }
}
