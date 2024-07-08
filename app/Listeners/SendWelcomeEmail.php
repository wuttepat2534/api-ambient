<?php

namespace App\Listeners;

use App\Events\UserRegister;
use App\Mail\CreateAccount;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendWelcomeEmail implements ShouldQueue
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
    public function handle(UserRegister $event): void
    {
        $user = $event->user;
        Mail::to($user->email)->send(new CreateAccount($user));
    }
}
