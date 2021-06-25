<?php

namespace App\Exceptions;

use Exception;

class ManufacturersUpdaterException extends Exception
{

    /**
     * ManufacturersUpdaterException constructor.
     */
    public function __construct($message)
    {
        parent::__construct($message);
    }
}
