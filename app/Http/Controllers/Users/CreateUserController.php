<?php

namespace App\Http\Controllers\Users;

use App\Exceptions\Users\UserAlreadyExistsException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Users\CreateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;

class CreateUserController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CreateUserRequest $request)
    {
        $data = $request->validated();

        $exists = User::where('email', $data['email'])->exists();

        if ($exists) {
            throw new UserAlreadyExistsException();
        }

        $data['role'] = 'user';

        $user = User::create($data);

        return UserResource::make($user);
    }
}
