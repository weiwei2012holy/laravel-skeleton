<?php

namespace App\Exceptions;

use App\Lib\FastResponse;
use Exception;

class BusinessErrorException extends Exception
{
    public function render($request)
    {
        if ($request->is('api/*')) {
            return FastResponse::error($this->getMessage());
        }
    }

}
