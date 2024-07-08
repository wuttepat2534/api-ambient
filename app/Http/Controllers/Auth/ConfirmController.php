<?php

namespace App\Http\Controllers\Auth;

use App\Exceptions\AlreadVerifyExeption;
use App\Exceptions\InvalidTokenExeption;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ConfirmRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class ConfirmController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ConfirmRequest $request)
    {
        $data = $request->validated();

        $user = User::where('uuid', $data['token'])->first();

        if(!$user) {
            throw new InvalidTokenExeption();
        }

        if($user->active) {
            throw new AlreadVerifyExeption();
        }

        $user->active = true;
        $user->save();

        return new UserResource($user);
    }
}
