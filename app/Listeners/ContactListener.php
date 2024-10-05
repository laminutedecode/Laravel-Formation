<?php

namespace App\Listeners;

use App\Events\ContactEvent;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class ContactListener 
{



    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ContactEvent $event)
    {
        Mail::to('laminutedecode@gmail.com')->send(new ContactMail($event->details));
    }
}
