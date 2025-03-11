<?php

namespace App\Mail;
use Illuminate\Mail\Mailable;

class ContactMail extends Mailable
{
    public $email, $password;

    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    public function build()
    {
        return $this->subject('Your Login Credentials')
                    ->view('emails.credentials');
    }
}
