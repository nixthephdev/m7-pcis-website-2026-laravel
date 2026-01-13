<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Enrollment;

class ApplicationReceived extends Mailable
{
    use Queueable, SerializesModels;

    public $enrollment; // Public variable to access data in the view

    // Constructor: Accepts the student data
    public function __construct(Enrollment $enrollment)
    {
        $this->enrollment = $enrollment;
    }

    // Build the message
    public function build()
    {
        return $this->subject('Application Received - M7 PCIS')
                    ->view('emails.application_received');
    }
}