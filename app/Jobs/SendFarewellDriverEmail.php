<?php

namespace App\Jobs;

use App\Mail\FarewellDriverMail;
use App\Models\Driver;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\Middleware\WithoutOverlapping;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendFarewellDriverEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $driverId;

    public int $tries = 5;
    public array $backoff = [60, 300];

    public function __construct(int $driverId)
    {
        $this->driverId = $driverId;
    }

    public function middleware(): array
    {
        return [new WithoutOverlapping("farewell-driver-{$this->driverId}")];
    }

    public function handle(): void
    {
        $driver = Driver::withTrashed()->find($this->driverId);

        if (!$driver || empty($driver->email)) {
            return;
        }

        Mail::to($driver->email)->queue(new FarewellDriverMail($driver));
    }
}
