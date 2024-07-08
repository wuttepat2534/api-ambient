<?php

namespace App\Exceptions\Users;

use App\Traits\ExceptionRender;
use Exception;

class UserNotFoundException extends Exception
{
    use ExceptionRender;

    protected $code = 404;
    protected $message = 'User not found.';
}
