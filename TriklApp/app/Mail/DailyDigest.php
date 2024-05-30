<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DailyDigest extends Mailable
{
    use Queueable, SerializesModels;

    public $posts;

    public function __construct($posts)
    {
        $this->posts = $posts;
    }

    public function build()
    {
        return $this->view('emails.digest');
    }
}