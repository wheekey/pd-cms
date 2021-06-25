<?php

namespace App\Exceptions;

use Exception;

class ShopImagesException extends Exception
{

    /**
     * ShopImagesException constructor.
     */
    public function __construct($message)
    {
        parent::__construct($message);
    }
}
