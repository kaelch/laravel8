<?php

namespace App\Http\Controllers;

use App\Events\NewsletterEvent;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function index()
    {
        return view('newsletter');

    }

    public function send()
    {
        \Log::Debug(request());
        $email = request()->email;

        event(new NewsletterEvent($email));

        return view('newsletter');
    }
}
