<?php

declare(strict_types=1);

namespace CoRex\Site\Helpers;

use CoRex\Helpers\Obj;
use CoRex\Site\Exceptions\SiteException;

class Bootstrap
{
    // Theme constants.
    public const THEME_BOOTSTRAP = [
        'name' => 'bootstrap',
        'type' => 'bootstrap',
        'theme' => 'css',
        'integrity' => 'sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO'
    ];
    public const THEME_CERULEAN = [
        'name' => 'cerulean',
        'type' => 'bootswatch',
        'theme' => 'cerulean',
        'integrity' => 'sha384-qVp3sGZJcZdk20BIG6O0Sb0sYRyedif3+Z8bZtQueBW/g7Dp67a0XdiMmmWCCm82'
    ];
    public const THEME_COSMO = [
        'name' => 'cosmo',
        'type' => 'bootswatch',
        'theme' => 'cosmo',
        'integrity' => 'sha384-3Ivskwia8Fui5tbQi+RW4DgTkJ8d+hW7mLe7Yk89ibmD9482VECh0WFof8kIEjwI'
    ];
    public const THEME_CYBORG = [
        'name' => 'cyborg',
        'type' => 'bootswatch',
        'theme' => 'cyborg',
        'integrity' => 'sha384-4DAPMwiyOJv/C/LvTiUsW5ueiD7EsaAhwUKO0Llp+fWzT40XrmAbayhVP00bAJVa'
    ];
    public const THEME_DARKLY = [
        'name' => 'darkly',
        'type' => 'bootswatch',
        'theme' => 'darkly',
        'integrity' => 'sha384-w+yWASP3zYNxxvwoQBD5fUSc1tctKq4KUiZzxgkBSJACiUp+IbweVKvsEhMI+gz7'
    ];
    public const THEME_FLATLY = [
        'name' => 'flatly',
        'type' => 'bootswatch',
        'theme' => 'flatly',
        'integrity' => 'sha384-gJWVjz180MvwCrGGkC4xE5FjhWkTxHIR/+GgT8j2B3KKMgh6waEjPgzzh7lL7JZT'
    ];
    public const THEME_JOURNAL = [
        'name' => 'journal',
        'type' => 'bootswatch',
        'theme' => 'journal',
        'integrity' => 'sha384-5C8TGNupopdjruopVTTrVJacBbWqxHK9eis5DB+DYE6RfqIJapdLBRUdaZBTq7mE'
    ];
    public const THEME_LITERA = [
        'name' => 'litera',
        'type' => 'bootswatch',
        'theme' => 'litera',
        'integrity' => 'sha384-JuAGGg3c8UPrWdf0N8ZPJyOHkACruI9+mbl0C+H6XSYOqv9xIdiUSKehRyA8jUol'
    ];
    public const THEME_LUMEN = [
        'name' => 'lumen',
        'type' => 'bootswatch',
        'theme' => 'lumen',
        'integrity' => 'sha384-DfbCiBdRiiNWvRTbHe5X9IfkezKzm0pCrZSKc7EM9mmSl/OyckwbYk3GrajL8Ngy'
    ];
    public const THEME_LUX = [
        'name' => 'lux',
        'type' => 'bootswatch',
        'theme' => 'lux',
        'integrity' => 'sha384-ML9h/UCooefre72ZPxxOHyjbrLT1xKV0AHON1J+OlOV2iwcYemqmWyMfTcfyzLJ1'
    ];
    public const THEME_MATERIA = [
        'name' => 'materia',
        'type' => 'bootswatch',
        'theme' => 'materia',
        'integrity' => 'sha384-5bFGNjwF8onKXzNbIcKR8ABhxicw+SC1sjTh6vhSbIbtVgUuVTm2qBZ4AaHc7Xr9'
    ];
    public const THEME_MINTY = [
        'name' => 'minty',
        'type' => 'bootswatch',
        'theme' => 'minty',
        'integrity' => 'sha384-Qt9Hug5NfnQDGMoaQYXN1+PiQvda7poO7/5k4qAmMN6evu0oDFMJTyjqaoTGHdqf'
    ];
    public const THEME_PULSE = [
        'name' => 'pulse',
        'type' => 'bootswatch',
        'theme' => 'pulse',
        'integrity' => 'sha384-c0rj6xRl6Zm4U4BwLaWhUoP/xPI8Sq+9Gt0F+JO5DSLZN0Ur0Ihc6rU59Rbgk1zV'
    ];
    public const THEME_SANDSTONE = [
        'name' => 'sandstone',
        'type' => 'bootswatch',
        'theme' => 'sandstone',
        'integrity' => 'sha384-CfCAYEgrdtRrpvjGKxoaRy5ge1ggMbxNSpEkY+XqdfdRTUkRrYZVB2z99E7BsEDZ'
    ];
    public const THEME_SIMPLEX = [
        'name' => 'simplex',
        'type' => 'bootswatch',
        'theme' => 'simplex',
        'integrity' => 'sha384-C/fi3Y7sgGQc3Lxu71QIVbBJ9iNQ/11o+YZNg2GRUrRrJayHEMpEc2I/jFSkMXAW'
    ];
    public const THEME_SKETCHY = [
        'name' => 'sketchy',
        'type' => 'bootswatch',
        'theme' => 'sketchy',
        'integrity' => 'sha384-5cy8WdlNAGqQwyB33aLiqJoRQQxZsc3TDUkSTahHAx2gMK3o0te7Xqm+nNLe4Ou3'
    ];
    public const THEME_SLATE = [
        'name' => 'slate',
        'type' => 'bootswatch',
        'theme' => 'slate',
        'integrity' => 'sha384-ywjdn7N8uoxzIfGl7jlEBlqw2BNicOSzZDgo7A2ffvbM24Ct9plRp7KwtaIqZ33j'
    ];
    public const THEME_SOLAR = [
        'name' => 'solar',
        'type' => 'bootswatch',
        'theme' => 'solar',
        'integrity' => 'sha384-h5kYMLFNMyLXdVYK3MKZeOfXMdU6XqV1do5KyjoYZGlW1FJOj+5qr9u1d7NNCH4N'
    ];
    public const THEME_SPACELAB = [
        'name' => 'spacelab',
        'type' => 'bootswatch',
        'theme' => 'spacelab',
        'integrity' => 'sha384-Xz7cmOriFCe/JvTrkgJ3kkDsR1J/mZw7hflmvRq74Mv5W7LwSyl07d/xLcs4CrRe'
    ];
    public const THEME_SUPERHERO = [
        'name' => 'superhero',
        'type' => 'bootswatch',
        'theme' => 'superhero',
        'integrity' => 'sha384-u4BOm6DXWNW9DDMz3uKYKOOtsYm6pt8m8DxK2sVQ9RJVnWP8mjOIct/zzXkwobmN'
    ];
    public const THEME_UNITED = [
        'name' => 'united',
        'type' => 'bootswatch',
        'theme' => 'united',
        'integrity' => 'sha384-+d4wMJSxEP3vzs2qZBElQRTZMXwgWH15Nyn2K/9XjKiHmh3sBuk1Un/IbcdMcYC4'
    ];
    public const THEME_YETI = [
        'name' => 'yeti',
        'type' => 'bootswatch',
        'theme' => 'yeti',
        'integrity' => 'sha384-MEq8xmFd953gp2FVvLd8DUEvfBjGCzDjem+gmDqfyyWcaxX4BUD7TtSu1EszNTvK'
    ];

    // Bootstrap (used internally).
    public const BOOTSTRAP_VERSION = '4.1.3';
    public const BOOTSTRAP_SCRIPT_INTEGRITY = 'sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy';

    // jQuery (used internally).
    public const JQUERY_VERSION = '3.3.1';

    // Popper /user internally).
    public const POPPER_VERSION = '1.14.3';
    public const POPPER_SCRIPT_INTEGRITY = 'sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49';

    // Base url for Bootstrap and Popper (user internally).
    public const CDN_BASE_URL = 'https://stackpath.bootstrapcdn.com';

    /**
     * Bootstrap theme url.
     *
     * @param string[] $themeConstant See self::THEME_*.
     * @return string
     * @throws SiteException
     */
    public static function bootstrapThemeUrl(array $themeConstant): string
    {
        if (count($themeConstant) !== 4) {
            throw new SiteException('Theme constant not valid. Must be [type, theme, integrity].');
        }
        $url = self::CDN_BASE_URL . '/{type}/{version}/{theme}/bootstrap.min.css';
        $url = str_replace('{type}', $themeConstant['type'], $url);
        $url = str_replace('{version}', self::BOOTSTRAP_VERSION, $url);
        $url = str_replace('{theme}', $themeConstant['theme'], $url);
        return $url;
    }

    /**
     * Bootstrap theme integrity.
     *
     * @param string[] $themeConstant See self::THEME_*.
     * @return string
     * @throws SiteException
     */
    public static function bootstrapThemeIntegrity(array $themeConstant): string
    {
        if (count($themeConstant) !== 4) {
            throw new SiteException('Theme constant not valid. Must be [type, theme, integrity].');
        }
        return $themeConstant['integrity'];
    }

    /**
     * Bootstrap script url.
     *
     * @return string
     */
    public static function bootstrapScriptUrl(): string
    {
        return self::CDN_BASE_URL . '/bootstrap/' . self::BOOTSTRAP_VERSION . '/js/bootstrap.min.js';
    }

    /**
     * Bootstrap script integrity.
     *
     * @return string
     */
    public static function bootstrapScriptIntegrity(): string
    {
        return self::BOOTSTRAP_SCRIPT_INTEGRITY;
    }

    /**
     * Script jQuery.
     *
     * @return string
     */
    public static function jQueryScriptUrl(): string
    {
        return 'https://ajax.googleapis.com/ajax/libs/jquery/' . self::JQUERY_VERSION . '/jquery.min.js';
    }

    /**
     * Popper script url.
     *
     * @return string
     */
    public static function popperScriptUrl(): string
    {
        return 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/' . self::POPPER_VERSION . '/umd/popper.min.js';
    }

    /**
     * Popper script integrity.
     *
     * @return string
     */
    public static function popperScriptIntegrity(): string
    {
        return self::POPPER_SCRIPT_INTEGRITY;
    }

    /**
     * Get theme name.
     *
     * @param string[] $themeConstant
     * @return string
     */
    public static function getThemeName(array $themeConstant): string
    {
        return $themeConstant['name'];
    }

    /**
     * Get theme constant.
     *
     * @param string $themeName
     * @return string[]
     */
    public static function getThemeConstant(string $themeName): ?array
    {
        $constants = Obj::getConstants(self::class);
        foreach ($constants as $constantName => $constant) {
            if (substr($constantName, 0, 6) !== 'THEME_') {
                continue;
            }
            if ($constant['name'] === $themeName) {
                return $constant;
            }
        }
        return null;
    }

    /**
     * Get theme constant by name.
     *
     * @param string $themeName
     * @return string[]
     */
    public static function getThemeConstantByName(string $themeName): ?array
    {
        $themeName = strtoupper($themeName);
        $constants = Obj::getConstants(self::class);
        foreach ($constants as $constantName => $constant) {
            $constantName = strtoupper($constantName);
            if (substr($constantName, 0, 6) !== 'THEME_') {
                continue;
            }
            if ($constantName === 'THEME_' . $themeName) {
                return $constant;
            }
        }
        return null;
    }
}