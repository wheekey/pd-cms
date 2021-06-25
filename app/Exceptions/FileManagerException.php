<?php

namespace App\Exceptions;

use Exception;

class FileManagerException extends Exception
{
    /**
     * ShopImagesException constructor.
     */
    public function __construct($message)
    {
        parent::__construct($message);
    }
}
