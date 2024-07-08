<?php

namespace App\Http\Controllers\Auth;

use App\Exceptions\Auth\InvalidAuthenticationException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;

class LoginController extends Controller
{
    /**
     * Attempt to authenticate the user.
     * @param  LoginRequest  $request
     * @return \Illuminate\Http\JsonResponse
     * @throws InvalidAuthenticationException
     */
    public function __invoke(LoginRequest $request): JsonResponse
    {
        $data = $request->validated();

        if (!auth()->attempt($data)) {
            throw new InvalidAuthenticationException();
        }

        $user = new UserResource(auth()->user());
        $token = auth()->user()->createToken('authToken')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token,
        ]);
    }
}
