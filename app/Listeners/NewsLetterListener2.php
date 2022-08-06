<?php

namespace App\Listeners;

use App\Events\NewsLetterEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NewsLetterListener2
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\NewsLetterEvent  $event
     * @return void
     */
    public function handle(NewsLetterEvent $event)
    {
        //
    }
}
