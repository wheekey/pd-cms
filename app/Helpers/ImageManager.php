<?php

namespace App\Helpers;

use App\Exceptions\FileManagerException;

class ImageManager
{
    private $imgUrl;
    private $imgFullPath;

    /**
     * ImageManager constructor.
     * @param $imgUrl
     * @param $imgFullPath
     */
    public function __construct($imgUrl, $imgFullPath)
    {
        $this->imgUrl = $imgUrl;
        $this->imgFullPath = $imgFullPath;
    }

    public function resize()
    {
        $im = new SimpleImage($this->imgFullPath);
        $im->maxarea(500, 500);
        $im->save($this->imgFullPath);
    }

    /**
     * @throws FileManagerException
     */
    public function copy()
    {
        FileManager::copy($this->imgUrl, $this->imgFullPath);
    }
}
