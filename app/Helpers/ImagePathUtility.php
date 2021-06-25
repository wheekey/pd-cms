<?php

namespace App\Helpers;

class ImagePathUtility
{
    public function formFilename($id)
    {
        return $id . '.jpg';
    }

    /**
     * @param $id int
     * @return string
     */
    public function formImgFullPath($id)
    {
        return getenv("SHOP_IMAGE_DIR") . '/' . $this->formFilename($id);
    }

    /**
     * @param $baseImgUrl string
     * @param $imgName string
     * @return string
     */
    public function formImgUrl($baseImgUrl, $imgName)
    {
        return $baseImgUrl . $imgName;
    }

    /**
     * @param $filename string
     * @return string
     */
    public function sanitizeImgFileName($filename)
    {
        return ltrim($filename, '/');
    }

    public function isValidPDLXImgSubPath($image)
    {
        return false !== strpos($image, '/');
    }
}
