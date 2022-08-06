<?php

namespace App\Listeners;

use App\Events\NewsletterEvent;
use App\Jobs\NewsletterJob;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NewsletterEventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        \Log::Debug('MusicEventListener construct');
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\NewsLetterEvent  $event
     * @return void
     */
    public function handle(NewsLetterEvent $event)
    {
        \Log::Debug('MusicEventListener handle');

        dispatch(new NewsletterJob($event->email));
    }
}
