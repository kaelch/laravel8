<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\File;

class UserJoined extends Mailable
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
        $public_path = public_path('images/laravel_logo_svg.svg');

        return $this->subject($this->user['name'] . '의 회원가입을 축하합니다.')
                    ->attach($public_path)
                    ->view('emails.join-welcome')
                    ->with(['custom' => 'thank you thank you!'])
                ;
//            ->text('emails.reminder_plain'); HTML이 아닌 일반 텍스트를 보내고 싶을 경우.
//        from - 보낸 사람
//        subject - 이메일 제목
//        attach($file, array $options = []) - 파일 첨부
//        attachFromStorage($path, $name=null, array $option => [])
//        priority($level = n) - 우선순위 지정

    }
}
