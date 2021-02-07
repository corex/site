<?php

declare(strict_types=1);

namespace CoRex\Site;

use CoRex\Filesystem\File;
use CoRex\Helpers\Traits\ConstantsStaticTrait;
use CoRex\Site\Exceptions\BootstrapException;
use CoRex\Site\Helpers\Path;

class Bootstrap
{
    use ConstantsStaticTrait;

    /** @var string */
    private static $theme;

    /** @var string */
    private static $version;

    /** @var string */
    private static $versionLoaded;

    /** @var string[] */
    private static $data;

    // Theme constants.
    public const THEME_BOOTSTRAP = 'bootstrap';
    public const THEME_CERULEAN = 'cerulean';
    public const THEME_COSMO = 'cosmo';
    public const THEME_CYBORG = 'cyborg';
    public const THEME_DARKLY = 'darkly';
    public const THEME_FLATLY = 'flatly';
    public const THEME_JOURNAL = 'journal';
    public const THEME_LITERA = 'litera';
    public const THEME_LUMEN = 'lumen';
    public const THEME_LUX = 'lux';
    public const THEME_MATERIA = 'materia';
    public const THEME_MINTY = 'minty';
    public const THEME_PULSE = 'pulse';
    public const THEME_SANDSTONE = 'sandstone';
    public const THEME_SIMPLEX = 'simplex';
    public const THEME_SKETCHY = 'sketchy';
    public const THEME_SLATE = 'slate';
    public const THEME_SOLAR = 'solar';
    public const THEME_SPACELAB = 'spacelab';
    public const THEME_SUPERHERO = 'superhero';
    public const THEME_UNITED = 'united';
    public const THEME_YETI = 'yeti';

    // Version constants.
    public const LATEST = self::V4_5_2;
    public const V4_5_2 = '4.5.2';
    public const V4_3_1 = '4.3.1';
    public const V4_1_3 = '4.1.3';

    /**
     * Get layout name.
     *
     * @return string
     */
    public static function getLayoutName(): string
    {
        return 'bootstrap-' . self::getVersion();
    }

    /**
     * Set version.
     *
     * @param string $version
     */
    public static function setVersion(string $version): void
    {
        self::$version = $version;
    }

    /**
     * Clear version.
     */
    public static function clearVersion(): void
    {
        self::$version = null;
    }

    /**
     * Get version.
     *
     * @return string
     */
    public static function getVersion(): string
    {
        $version = self::$version;
        if ($version === null) {
            $version = self::LATEST;
        }
        return $version;
    }

    /**
     * Get versions.
     *
     * @return string[]
     */
    public static function getVersions(): array
    {
        $versions = [];
        $publicClassConstants = self::getPublicClassConstants();
        foreach ($publicClassConstants as $constant => $version) {
            if (substr($constant, 0, 1) === 'V') {
                $versions[] = $version;
            }
        }
        return $versions;
    }

    /**
     * Has theme.
     *
     * @param string $theme
     * @return bool
     */
    public static function hasTheme(string $theme): bool
    {
        return self::hasPublicClassConstantByValue($theme);
    }

    /**
     * Set theme.
     *
     * @param string $theme See Theme::THEME_*.
     * @throws BootstrapException
     */
    public static function setTheme(string $theme): void
    {
        if (!self::hasTheme($theme)) {
            throw new BootstrapException('Theme ' . $theme . ' not found.');
        }
        self::$theme = $theme;
    }

    /**
     * Clear theme.
     */
    public static function clearTheme(): void
    {
        self::$theme = null;
        self::$versionLoaded = null;
        self::$data = null;
    }

    /**
     * Get theme.
     *
     * @return string|null
     */
    public static function getTheme(): ?string
    {
        return self::$theme;
    }

    /**
     * Get themes.
     *
     * @return string[]
     */
    public static function getThemes(): array
    {
        $themes = [];
        $publicClassConstants = self::getPublicClassConstants();
        foreach ($publicClassConstants as $constant => $theme) {
            if (substr($constant, 0, 6) === 'THEME_') {
                $themes[] = $theme;
            }
        }
        return $themes;
    }

    /**
     * Get theme data.
     *
     * @return string[]
     */
    public static function getThemeData(): array
    {
        // Load theme data if needed
        if (self::$data === null) {
            $version = self::getVersion();
            if (self::$versionLoaded !== $version) {
                $themesFilename = Path::packageCurrent(['resources/layouts']) . '/bootstrap-' . $version . '.json';
                self::$data = File::getJson($themesFilename);
            }
        }

        $theme = self::getTheme();
        if (isset(self::$data[$theme])) {
            return self::$data[$theme];
        }

        return [];
    }
}