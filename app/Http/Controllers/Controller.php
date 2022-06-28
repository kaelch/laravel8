<?php

namespace App\Http\Controllers;

use App\Mail\UserJoined;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Mail;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function sendMail()
    {

        $user1 = 'kaelch@naver.com';

        $user = [
            'name' => 'ithank trainer'
        ];

        $mail = new UserJoined($user);

        // 1. 그냥 전송
        Mail::to($user1)->send($mail);

//        // 2. 참조 및 숨김 넣기
//        Mail::to($user1)
//            ->cc($user2)
//            ->bcc($user3)
//            ->send($mail);
//
//        // 3. 컬렉션 넣기
//        Mail::to('me@app.com')
//            ->bcc(User::all())
//            ->send($mail);
    }
}
