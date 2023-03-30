<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendemailAdmin extends Mailable
{
    use Queueable, SerializesModels;
    public $info;
    public $info2;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($info, $info2)
    {
        $this->info = $info;
        $this->info2 = $info2;
    }

    public function build()
    {
        return $this->subject('Test Email Admin')->view('emailsAdmin');
    }
}