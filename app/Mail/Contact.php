<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    protected $name;
    protected $email;
    protected $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email, $message)
    {
        $this->name = $name;
        $this->email = $email;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('jesus.raop@gmail.com')
                    ->subject('Hey! Someone is writing you from your portfolio!')
                    // ->view('emails.email');
                    ->markdown('emails.emailMarkdown')
                    ->with([
                        "name" => $this->name,
                        "email" => $this->email,
                        "message" => $this->message,
                    ]);
    }
}
