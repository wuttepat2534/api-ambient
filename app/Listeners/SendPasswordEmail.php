<?php

namespace App\Listeners;

use App\Events\PasswordChanged;
use App\Mail\ResetPassword;
use Illuminate\Support\Facades\Mail;

class SendPasswordEmail
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
    public function handle(PasswordChanged $event): void
    {
        $user = $event->user;

        Mail::to($user->email)->send(new ResetPassword($user));
    }
}
