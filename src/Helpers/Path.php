<?php

declare(strict_types=1);

namespace CoRex\Site\Helpers;

use CoRex\Filesystem\Path as FilesystemPath;

class Path extends FilesystemPath
{
    /**
     * Package path.
     *
     * @return string
     */
    protected static function packagePath(): string
    {
        return dirname(dirname(__DIR__));
    }
}