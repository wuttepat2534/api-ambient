<?php

namespace App\Exceptions\Environments;

use App\Traits\ExceptionRender;
use Exception;

class EnvironmentNotFoundException extends Exception
{
    use ExceptionRender;

    protected $code = 404;
    protected $message = 'Environment not found.';
}
