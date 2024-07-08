<?php

namespace App\Exceptions\Budgets;

use App\Traits\ExceptionRender;
use Exception;

class ProductNotFoundException extends Exception
{
    use ExceptionRender;

    protected $code = 404;
    protected $message = 'Budget not found.';
}
