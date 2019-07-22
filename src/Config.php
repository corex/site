<?php

declare(strict_types=1);

namespace CoRex\Site;

use CoRex\Site\Exceptions\BootstrapException;
use CoRex\Site\Helpers\Path;

class Config
{
    /** @var string[] */
    private static $layoutPaths;

    /** @var string[] */
    private static $viewPaths;

    /**
     * Set layout path (can be called more than once).
     *
     * @param string $path
     */
    public static function setLayoutPath(string $path): void
    {
        self::initialize();
        self::$layoutPaths[] = $path;
    }

    /**
     * Get layout paths.
     *
     * @return string[]
     */
    public static function getLayoutPaths(): array
    {
        self::initialize();
        return self::$layoutPaths;
    }

    /**
     * Set view path.
     *
     * @param string $path
     */
    public static function setViewPath(string $path): void
    {
        self::initialize();
        self::$viewPaths[] = $path;
    }

    /**
     * Get view paths.
     *
     * @return string[]
     */
    public static function getViewPaths(): array
    {
        self::initialize();
        return self::$viewPaths;
    }

    /**
     * Set theme.
     *
     * @param string $theme See Theme::THEME_*.
     * @throws BootstrapException
     */
    public static function setTheme(string $theme): void
    {
        Bootstrap::setTheme($theme);
    }

    /**
     * Get default layout path.
     *
     * @return string
     */
    public static function getDefaultLayoutPath(): string
    {
        return Path::packageCurrent(['resources/layouts']);
    }

    /**
     * Get default view path.
     *
     * @return string
     */
    public static function getDefaultViewPath(): string
    {
        return Path::packageCurrent(['resources/views']);
    }

    /**
     * Initialize.
     */
    private static function initialize(): void
    {
        if (!is_array(self::$layoutPaths)) {
            self::$layoutPaths = [];
            self::$layoutPaths[] = self::getDefaultLayoutPath();
        }
        if (!is_array(self::$viewPaths)) {
            self::$viewPaths = [];
            self::$viewPaths[] = self::getDefaultViewPath();
        }
    }
}