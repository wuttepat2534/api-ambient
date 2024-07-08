<?php

namespace App\Exceptions\Budgets;

use App\Traits\ExceptionRender;
use Exception;

class EnvironmentNotFoundException extends Exception
{
    use ExceptionRender;

    protected $code = 404;
    protected $message = 'Environment not found.';
}
