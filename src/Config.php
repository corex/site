<?php

declare(strict_types=1);

namespace CoRex\Site;

use CoRex\Site\Helpers\Bootstrap;
use CoRex\Site\Helpers\Path;

class Config
{
    /** @var string[] */
    private static $layoutPaths;

    /** @var string[] */
    private static $viewPaths;

    /** @var string[] */
    private static $themeConstant;

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
     * @param string[] $themeConstant See Boostrap::THEME_*.
     */
    public static function setTheme(array $themeConstant): void
    {
        self::initialize();
        self::$themeConstant = $themeConstant;
    }

    /**
     * Get theme.
     *
     * @return string[]
     */
    public static function getTheme(): ?array
    {
        self::initialize();
        return self::$themeConstant;
    }

    /**
     * Get theme name.
     *
     * @return string
     */
    public static function getThemeName(): ?string
    {
        self::initialize();
        if (self::$themeConstant !== null) {
            return Bootstrap::getThemeName(self::$themeConstant);
        }
        return null;
    }

    /**
     * Get default layout path.
     *
     * @return string
     */
    public static function getDefaultLayoutPath(): string
    {
        return Path::packageCurrent(['templates/layouts']);
    }

    /**
     * Get default view path.
     *
     * @return string
     */
    public static function getDefaultViewPath(): string
    {
        return Path::packageCurrent(['templates/views']);
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