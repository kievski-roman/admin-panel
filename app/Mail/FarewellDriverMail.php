<?php

namespace App\Mail;

use App\Models\Driver;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FarewellDriverMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public Driver $driver;

    public function __construct(Driver $driver)
    {
        $this->driver = $driver;
    }

    public function build()
    {
        return $this->subject('Дякуємо за співпрацю — АТП')
            ->view('emails.farewell-driver');
    }
}
