<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SalaryDetails extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */

    public $salary;

    public function __construct($salary)
    {
        $this->salary = $salary;
    }
    /**
     * Get the message envelope.
     */

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Salary Details',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'email.salary_details',
        );
    }
    public function build()
    {
        return $this->markdown('email.salary_details')
                    ->subject('Salary Details');
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
