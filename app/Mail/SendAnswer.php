<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Date;

class SendAnswer extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
   public $email;
   public $name ;
   public $text ;

    public function __construct($email , $name , $text)
    {
        $this->email = $email;
        $this->name = $name;
        $this->text = $text;

    }

    /**
     * Get the message envelope.
     */
    public function build()
    {
        return $this->markdown('emails.SendAnswer');
    }


   
}
