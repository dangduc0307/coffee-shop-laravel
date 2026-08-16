<?php

namespace App\Jobs;

use App\Mail\UserAccountCreatedMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendUserAccountMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 3;

    public function __construct(
        public string $name,
        public string $email,
        public string $password,
    ) {
    }

    public function handle(): void
    {
        Mail::to($this->email)
            ->send(
                new UserAccountCreatedMail(
                    $this->name,
                    $this->email,
                    $this->password
                )
            );
    }
}