<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactFormSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct()
    {
        //
    }
    public function build()
    {
        if (!$to_email) {
            return response()->json(['message' => 'To email is required.'], 422);
        }
        return $this->to('danish250ahmad@gmail.com')
                    ->subject('New Contact Form Submission')
                    ->view('emails.contact')
                    ->with([
                        'company' => $this->data['company'],
                        'contact_name' => $this->data['contact_name'],
                        'email' => $this->data['email'],
                        'phone' => $this->data['phone'],
                        'location' => $this->data['location'],
                        'size' => $this->data['size'],
                        'power_supply' => $this->data['power_supply'],
                        'material' => $this->data['material'],
                        'waste' => $this->data['waste'],
                        'additional_info' => $this->data['additional_info'],
                    ]);
    }
    
    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Contact Form Submitted',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        // return new Content(
        //     view: 'analytics',
        // );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
