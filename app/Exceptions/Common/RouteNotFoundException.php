<?php

namespace App\Exceptions\Common;

use App\Traits\ExceptionRender;
use Exception;

class RouteNotFoundException extends Exception
{
    use ExceptionRender;

    protected $code = 404;
    protected $message = 'Route not found.';
}
