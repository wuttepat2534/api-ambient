<?php

namespace App\Http\Controllers\Auth;

use App\Events\PasswordChanged;
use App\Exceptions\InvalidPinExeption;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\PasswordRequest;
use App\Http\Resources\UserResource;
use App\Models\UserPin;

class PasswordController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(PasswordRequest $request)
    {
        $data = $request->validated();

        $pin = UserPin::where('pin', $data['pin'])
            ->where('created_at', '>=', now()->subDay())
            ->first();

        if(!$pin) {
            throw new InvalidPinExeption();
        }

        $user = $pin->user;

        $user->password = $data['password'];
        $user->save();

        $user->pins()->delete();

        PasswordChanged::dispatch($user);

        return UserResource::make($user);
    }
}
