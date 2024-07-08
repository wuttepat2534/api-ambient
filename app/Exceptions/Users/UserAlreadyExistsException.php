<?php

namespace App\Exceptions\Users;

use App\Traits\ExceptionRender;
use Exception;

class UserAlreadyExistsException extends Exception
{
    use ExceptionRender;

    protected $code = 409;
    protected $message = 'User already exists.';
}
