<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Invoice extends Mailable
{
    use Queueable, SerializesModels;
    private $orderan;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($orderan)
    {
        $this->orderan = $orderan;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('admin@mail.com')
                    ->view('orderan.invoice')
                    ->with(['orderan' => $this->orderan]);
    }
}
