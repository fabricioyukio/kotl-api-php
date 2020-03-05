<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Contender;

class ValidateContenderMail extends Mailable
{
    use Queueable, SerializesModels;
    public $contender;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($contender)
    {
        $this->contender = $contender;
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.applicant')->with(['contender'=>$this->contender]);
    }
}
