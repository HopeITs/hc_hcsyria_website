<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class UserEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $unsubscribeLink;
    /**
     * Create a new message instance.
     */
    public function __construct($unsubscribeLink)
    {
        $this->unsubscribeLink = $unsubscribeLink;
    }

    /**
     * Get the message envelope.
     */
    public function envelope()
    {
        return new Envelope(subject: 'Hope Center Newsletter');
    }

    /**
     * Get the message content definition.
     */
//    public function content(): Content
//    {
//        return new Content(
//            view: 'view.name',
//        );
//    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
//    public function attachments(): array
//    {
//        return [];
//    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Mail from Hope Center')
            ->view('new.admin.SubscriberMail');
    }
}
