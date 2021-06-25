<?php

namespace App\Helpers;

use App\Exceptions\FileManagerException;

class FileManager
{

    /**
     * @param $from
     * @param $to
     * @return bool
     * @throws FileManagerException
     */
    public static function copy($from, $to)
    {
        if (!copy(self::escapeUrl($from), $to)) {
            throw new FileManagerException("Не получен с сервера: $from ($to)");
        }
        return true;
    }

    /**
     * Функция преобразует url в нормальный для скачивания вид
     *
     * @param $url
     *
     * @return string
     */
    private static function escapeUrl($url)
    {
        $parts = parse_url($url);
        $path_parts = array_map('rawurldecode', explode('/', $parts['path']));

        return
            $parts['scheme'] . '://' .
            $parts['host'] .
            implode('/', array_map('rawurlencode', $path_parts));
    }
}
