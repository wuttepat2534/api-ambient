<?php

namespace App\Http\Controllers\Users;

use App\Exceptions\Users\UserNotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class DeleteUserController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            throw new UserNotFoundException();
        }

        $user->delete();

        return UserResource::make($user);
    }
}
