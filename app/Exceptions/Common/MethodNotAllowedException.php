<?php

namespace App\Exceptions\Common;

use App\Traits\ExceptionRender;
use Exception;

class MethodNotAllowedException extends Exception
{
    use ExceptionRender;

    protected $code = 405;
    protected $message = 'Method not allowed or invalid request.';
}
