<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactFormSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public array $data,
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New contact form — '.$this->data['name'],
            replyTo: [
                new Address($this->data['email'], $this->data['name']),
            ],
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.contact-form',
            with: [
                'typeLabel' => $this->typeLabel(),
            ],
        );
    }

    private function typeLabel(): string
    {
        return match ($this->data['type']) {
            'resident' => 'Resident Looking for Housing',
            'referral' => 'Agency or Referral Partner',
            default => 'Other',
        };
    }
}
