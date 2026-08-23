<?php

namespace App\Jobs;

use App\Mail\ContactMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendContactMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public string $name;
    public string $email;
    public string $contactSubject;
    public string $contactMessage;

    public function __construct(
        string $name,
        string $email,
        string $contactSubject,
        string $contactMessage
    ) {
        $this->name = $name;
        $this->email = $email;
        $this->contactSubject = $contactSubject;
        $this->contactMessage = $contactMessage;
    }

    public function handle(): void
    {
        Mail::to(config('mail.from.address'))
            ->send(
                new ContactMail(
                    $this->name,
                    $this->email,
                    $this->contactSubject,
                    $this->contactMessage
                )
            );
    }
}