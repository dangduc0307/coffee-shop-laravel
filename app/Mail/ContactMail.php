<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

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

    public function build()
    {
        return $this
            ->from(
                config('mail.from.address'),
                config('mail.from.name')
            )
            ->replyTo(
                $this->email,
                $this->name
            )
            ->subject(
                'Liên hệ WebList: ' . $this->contactSubject
            )
            ->view('emails.contact');
    }
}