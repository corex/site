<?php

declare(strict_types=1);

namespace Tests\CoRex\Site;

use CoRex\Filesystem\File;
use CoRex\Helpers\Obj;
use CoRex\Site\Bootstrap;
use CoRex\Site\Exceptions\BootstrapException;
use CoRex\Site\Helpers\Path;
use PHPUnit\Framework\TestCase;

class BootstrapTest extends TestCase
{
    /** @var string[] */
    private $themes = [
        'THEME_BOOTSTRAP' => 'bootstrap',
        'THEME_CERULEAN' => 'cerulean',
        'THEME_COSMO' => 'cosmo',
        'THEME_CYBORG' => 'cyborg',
        'THEME_DARKLY' => 'darkly',
        'THEME_FLATLY' => 'flatly',
        'THEME_JOURNAL' => 'journal',
        'THEME_LITERA' => 'litera',
        'THEME_LUMEN' => 'lumen',
        'THEME_LUX' => 'lux',
        'THEME_MATERIA' => 'materia',
        'THEME_MINTY' => 'minty',
        'THEME_PULSE' => 'pulse',
        'THEME_SANDSTONE' => 'sandstone',
        'THEME_SIMPLEX' => 'simplex',
        'THEME_SKETCHY' => 'sketchy',
        'THEME_SLATE' => 'slate',
        'THEME_SOLAR' => 'solar',
        'THEME_SPACELAB' => 'spacelab',
        'THEME_SUPERHERO' => 'superhero',
        'THEME_UNITED' => 'united',
        'THEME_YETI' => 'yeti'
    ];

    /** @var string[] */
    private $versions = [
        'V4_3_1' => '4.3.1',
        'V4_1_3' => '4.1.3'
    ];

    /**
     * Test theme constants.
     */
    public function testThemeConstants(): void
    {
        $constants = Obj::getConstants(Bootstrap::class);
        foreach ($this->themes as $constant => $theme) {
            $this->assertConstant($constants, $constant, $theme);
        }
    }

    /**
     * Test version constants.
     */
    public function testVersionConstants(): void
    {
        $constants = Obj::getConstants(Bootstrap::class);

        // Check latest.
        $this->assertConstant($constants, 'LATEST', array_values($this->versions)[0]);

        // Check all versions.
        foreach ($this->versions as $constant => $version) {
            $this->assertConstant($constants, $constant, $version);
        }
    }

    /**
     * Test get layout name.
     */
    public function testGetLayoutNameLatest(): void
    {
        $this->assertSame('bootstrap-' . Bootstrap::LATEST, Bootstrap::getLayoutName());
    }

    /**
     * Test get layout name version.
     */
    public function testGetLayoutNameVersion(): void
    {
        Bootstrap::setVersion(Bootstrap::V4_1_3);
        $this->assertSame('bootstrap-' . Bootstrap::V4_1_3, Bootstrap::getLayoutName());
    }

    /**
     * Test get version.
     */
    public function testGetVersion(): void
    {
        Bootstrap::setVersion(Bootstrap::V4_1_3);
        $this->assertSame(Bootstrap::V4_1_3, Bootstrap::getVersion());
    }

    /**
     * Test get latest version.
     */
    public function testLatestVersion(): void
    {
        $this->assertSame(Bootstrap::LATEST, Bootstrap::getVersion());
    }

    /**
     * Test set version.
     */
    public function testSetVersion(): void
    {
        $this->assertSame(Bootstrap::LATEST, Bootstrap::getVersion());
        Bootstrap::setVersion(Bootstrap::V4_1_3);
        $this->assertSame(Bootstrap::V4_1_3, Bootstrap::getVersion());
    }

    /**
     * Test get versions.
     */
    public function testGetVersions(): void
    {
        $versions = Bootstrap::getVersions();
        $this->assertContains(Bootstrap::V4_1_3, $versions);
        $this->assertContains(Bootstrap::V4_3_1, $versions);
    }

    /**
     * Test has theme.
     */
    public function testHasTheme(): void
    {
        $this->assertTrue(Bootstrap::hasTheme(Bootstrap::THEME_SLATE));
        $this->assertFalse(Bootstrap::hasTheme('unknown'));
    }

    /**
     * Test set theme.
     *
     * @throws BootstrapException
     */
    public function testSetTheme(): void
    {
        Bootstrap::setTheme(Bootstrap::THEME_SLATE);
        $this->assertSame(Bootstrap::THEME_SLATE, Bootstrap::getTheme());
    }

    /**
     * Test set theme unknown.
     *
     * @throws BootstrapException
     */
    public function testSetThemeUnknown(): void
    {
        $this->expectException(BootstrapException::class);
        $this->expectExceptionMessage('Theme unknown not found.');
        Bootstrap::setTheme('unknown');
    }

    /**
     * Test clear theme.
     *
     * @throws BootstrapException
     */
    public function testClearTheme(): void
    {
        Bootstrap::setTheme(Bootstrap::THEME_SLATE);
        Bootstrap::clearTheme();
        $this->assertNull(Bootstrap::getTheme());
    }

    /**
     * Test get theme.
     *
     * @throws BootstrapException
     */
    public function testGetTheme(): void
    {
        $this->testSetTheme();
    }

    /**
     * Test get themes.
     */
    public function testGetThemes(): void
    {
        $themes = Bootstrap::getThemes();
        foreach ($this->themes as $theme) {
            $this->assertContains($theme, $themes);
        }
    }

    /**
     * Test get theme data theme not set.
     */
    public function testGetThemeDataThemeNotSet(): void
    {
        $themeData = Bootstrap::getThemeData();
        $this->assertSame([], $themeData);
    }

    /**
     * Test get theme data theme set latest.
     *
     * @throws BootstrapException
     */
    public function testGetThemeDataThemeSetLatest(): void
    {
        $theme = Bootstrap::THEME_SLATE;
        Bootstrap::setTheme($theme);
        $themeData = Bootstrap::getThemeData();
        $themesData = $this->getThemesData();
        $this->assertSame($themesData[$theme], $themeData);
    }

    /**
     * Test get theme data theme set version.
     *
     * @throws BootstrapException
     */
    public function testGetThemeDataThemeSetVersion(): void
    {
        Bootstrap::setVersion(Bootstrap::V4_1_3);
        $theme = Bootstrap::THEME_YETI;
        Bootstrap::setTheme($theme);
        $themeData = Bootstrap::getThemeData();
        $themesData = $this->getThemesData();
        $this->assertSame($themesData[$theme], $themeData);
    }

    /**
     * Setup.
     */
    protected function setUp(): void
    {
        parent::setUp();
        Bootstrap::clearTheme();
        Bootstrap::clearVersion();
    }

    /**
     * Assert theme constant.
     *
     * @param string[] $themeConstants
     * @param string $key
     * @param string $value
     */
    private function assertConstant(array $themeConstants, string $key, string $value): void
    {
        $this->assertArrayHasKey($key, $themeConstants);
        $this->assertEquals($value, $themeConstants[$key]);
    }

    /**
     * Get themes data.
     *
     * @return string[]
     */
    private function getThemesData(): array
    {
        $version = Bootstrap::getVersion();
        $themesFilename = Path::packageCurrent(['resources/layouts']) . '/bootstrap-' . $version . '.json';
        return File::getJson($themesFilename);
    }
}