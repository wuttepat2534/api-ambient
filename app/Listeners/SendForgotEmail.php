<?php

namespace App\Listeners;

use App\Events\ForgotPassword;
use App\Mail\ForgotPassword as ForgotPasswordMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendForgotEmail implements ShouldQueue
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
    public function handle(ForgotPassword $event): void
    {
        $user = $event->user;
        $pin = $event->pin;

        Mail::to($user->email)->send(new ForgotPasswordMail($user, $pin));
    }
}
