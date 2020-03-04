<?php

namespace Aerni\Spotify\Exceptions;

use Exception;

class ValidatorException extends Exception
{
    public function __construct($message = null)
    {
        parent::__construct($message);
    }
}
