<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WorkWithUsMail extends Mailable
{
    use Queueable, SerializesModels;
    private $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = $this->data;
        
        if(isset($data['image'])){
            $path = public_path().'\\'.$data['image'];

            return $this->subject('Trabaja con nosotros')
                ->view('mail.work', compact('data'))
                ->attach($path);
        }else{
            return $this->subject('Contacto')->view('mail.contact', compact('data'));
        }
    }
}
