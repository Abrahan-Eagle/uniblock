<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactSendMail extends Mailable
{
    public $data;
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this -> data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = 'Nombre y Apellido:' . " " . $this->data['name'] . " " . 'Asunto' . " " . $this->data['subject'];

        toastr()->success('Envio éxitoso');

        return $this->markdown('emails.contactMail')->subject($subject)
        ->with([
            'data'=> $this-> data
        ]) ;
    }
}
