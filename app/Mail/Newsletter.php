<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Newsletter extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $public_path = public_path('images/golang.png');

        return $this->subject($this->user['email'] . '의 회원가입을 축하합니다.')
            ->attach($public_path)
            ->view('mail.newsletter')
            ->with(['custom' => 'thank you thank you!']);

//        return $this->view('view.name');
    }
}
