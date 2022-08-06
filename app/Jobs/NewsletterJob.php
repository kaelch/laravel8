<?php

namespace App\Jobs;

use App\Mail\Newsletter;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class NewsletterJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $email;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email)
    {
        \Log::debug('myjob construct');
        \Log::Debug($email);
        $this->email = $email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $user = [
            'email' => $this->email
        ];
        // 1. 그냥 전송
        $mail = new Newsletter($user);
        Mail::to($this->email)->send($mail);

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
        \Log::Debug('job handle');
    }
}
