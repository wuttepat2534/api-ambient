<?php

namespace App\Http\Controllers\Auth;

use App\Events\ForgotPassword;
use App\Exceptions\UserNotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ForgotRequest;
use App\Models\User;
use Illuminate\Support\Str;

class ForgotController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ForgotRequest $request)
    {
        $data = $request->validated();

        $user = User::where('email', $data['email'])->first();

        if (!$user) {
            throw new UserNotFoundException();
        }

        $pin = rand(100000, 999999);

        $user->pins()->create([
            'pin' => $pin,
        ]);

        ForgotPassword::dispatch($user, $pin);
    }
}
