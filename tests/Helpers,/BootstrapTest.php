<?php

declare(strict_types=1);

namespace Tests\CoRex\Site\Helpers;

use CoRex\Site\Exceptions\SiteException;
use CoRex\Site\Helpers\Bootstrap;
use PHPUnit\Framework\TestCase;

class BootstrapTest extends TestCase
{
    /** @var string */
    private $name;

    /** @var string */
    private $type;

    /** @var string */
    private $theme;

    /** @var string */
    private $integrity;

    /**
     * Test constants.
     */
    public function testConstants(): void
    {
        $this->assertEquals(Bootstrap::getThemeConstant('bootstrap'), Bootstrap::THEME_BOOTSTRAP);
        $this->assertEquals(Bootstrap::getThemeConstant('cerulean'), Bootstrap::THEME_CERULEAN);
        $this->assertEquals(Bootstrap::getThemeConstant('cosmo'), Bootstrap::THEME_COSMO);
        $this->assertEquals(Bootstrap::getThemeConstant('cyborg'), Bootstrap::THEME_CYBORG);
        $this->assertEquals(Bootstrap::getThemeConstant('darkly'), Bootstrap::THEME_DARKLY);
        $this->assertEquals(Bootstrap::getThemeConstant('flatly'), Bootstrap::THEME_FLATLY);
        $this->assertEquals(Bootstrap::getThemeConstant('journal'), Bootstrap::THEME_JOURNAL);
        $this->assertEquals(Bootstrap::getThemeConstant('litera'), Bootstrap::THEME_LITERA);
        $this->assertEquals(Bootstrap::getThemeConstant('lumen'), Bootstrap::THEME_LUMEN);
        $this->assertEquals(Bootstrap::getThemeConstant('lux'), Bootstrap::THEME_LUX);
        $this->assertEquals(Bootstrap::getThemeConstant('materia'), Bootstrap::THEME_MATERIA);
        $this->assertEquals(Bootstrap::getThemeConstant('minty'), Bootstrap::THEME_MINTY);
        $this->assertEquals(Bootstrap::getThemeConstant('pulse'), Bootstrap::THEME_PULSE);
        $this->assertEquals(Bootstrap::getThemeConstant('sandstone'), Bootstrap::THEME_SANDSTONE);
        $this->assertEquals(Bootstrap::getThemeConstant('simplex'), Bootstrap::THEME_SIMPLEX);
        $this->assertEquals(Bootstrap::getThemeConstant('sketchy'), Bootstrap::THEME_SKETCHY);
        $this->assertEquals(Bootstrap::getThemeConstant('slate'), Bootstrap::THEME_SLATE);
        $this->assertEquals(Bootstrap::getThemeConstant('solar'), Bootstrap::THEME_SOLAR);
        $this->assertEquals(Bootstrap::getThemeConstant('spacelab'), Bootstrap::THEME_SPACELAB);
        $this->assertEquals(Bootstrap::getThemeConstant('superhero'), Bootstrap::THEME_SUPERHERO);
        $this->assertEquals(Bootstrap::getThemeConstant('united'), Bootstrap::THEME_UNITED);
        $this->assertEquals(Bootstrap::getThemeConstant('yeti'), Bootstrap::THEME_YETI);
    }

    /**
     * Test bootstrapThemeUrl().
     *
     * @throws SiteException
     */
    public function testBootstrapThemeUrl(): void
    {
        $themeConstant = Bootstrap::THEME_SLATE;
        $url = Bootstrap::CDN_BASE_URL . '/{type}/{version}/{theme}/bootstrap.min.css';
        $url = str_replace('{type}', $themeConstant['type'], $url);
        $url = str_replace('{version}', Bootstrap::BOOTSTRAP_VERSION, $url);
        $url = str_replace('{theme}', $themeConstant['theme'], $url);
        $this->assertEquals($url, Bootstrap::bootstrapThemeUrl(Bootstrap::THEME_SLATE));
    }

    /**
     * Test bootstrapThemeUrlException().
     *
     * @throws SiteException
     */
    public function testBootstrapThemeUrlException(): void
    {
        $this->expectException(SiteException::class);
        $this->expectExceptionMessage('Theme constant not valid. Must be [type, theme, integrity].');
        $themeConstant = ['test1', 'test2', 'test3'];
        Bootstrap::bootstrapThemeUrl($themeConstant);
    }

    /**
     * Test bootstrapThemeIntegrity().
     *
     * @throws SiteException
     */
    public function testBootstrapThemeIntegrity(): void
    {
        $this->assertEquals($this->integrity, Bootstrap::bootstrapThemeIntegrity(Bootstrap::THEME_SLATE));
    }

    /**
     * Test bootstrapThemeIntegrity().
     *
     * @throws SiteException
     */
    public function testBootstrapThemeIntegrityException(): void
    {
        $this->expectException(SiteException::class);
        $this->expectExceptionMessage('Theme constant not valid. Must be [type, theme, integrity].');
        $themeConstant = ['test1', 'test2', 'test3'];
        Bootstrap::bootstrapThemeIntegrity($themeConstant);
    }

    /**
     * Test bootstrapScriptUrl().
     */
    public function testBootstrapScriptUrl(): void
    {
        $url = Bootstrap::CDN_BASE_URL . '/bootstrap/' . Bootstrap::BOOTSTRAP_VERSION . '/js/bootstrap.min.js';
        $this->assertEquals($url, Bootstrap::bootstrapScriptUrl());
    }

    /**
     * Test bootstrapScriptIntegrity().
     */
    public function testBootstrapScriptIntegrity(): void
    {
        $this->assertEquals(Bootstrap::BOOTSTRAP_SCRIPT_INTEGRITY, Bootstrap::bootstrapScriptIntegrity());
    }

    /**
     * Test jQueryScriptUrl().
     */
    public function testJQueryScriptUrl(): void
    {
        $version = Bootstrap::JQUERY_VERSION;
        $url = 'https://ajax.googleapis.com/ajax/libs/jquery/' . $version . '/jquery.min.js';
        $this->assertEquals($url, Bootstrap::jQueryScriptUrl());
    }

    /**
     * Test popperScriptUrl().
     */
    public function testPopperScriptUrl(): void
    {
        $version = Bootstrap::POPPER_VERSION;
        $url = 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/' . $version . '/umd/popper.min.js';
        $this->assertEquals($url, Bootstrap::popperScriptUrl());
    }

    /**
     * Test popperScriptIntegrity().
     */
    public function testPopperScriptIntegrity(): void
    {
        $this->assertEquals(Bootstrap::POPPER_SCRIPT_INTEGRITY, Bootstrap::popperScriptIntegrity());
    }

    /**
     * Test getThemeName().
     */
    public function testGetThemeName(): void
    {
        $this->assertEquals($this->name, Bootstrap::getThemeName(Bootstrap::THEME_SLATE));
    }

    /**
     * Test getThemeConstant().
     */
    public function testGetThemeConstant(): void
    {
        $this->assertEquals(Bootstrap::THEME_SLATE, Bootstrap::getThemeConstant('slate'));
    }

    /**
     * Test getThemeConstant() unknown.
     */
    public function testGetThemeConstantUnknown(): void
    {
        $this->assertNull(Bootstrap::getThemeConstant('unknown'));
    }

    /**
     * Test getThemeConstantByName().
     */
    public function testGetThemeConstantByName(): void
    {
        $this->assertEquals(Bootstrap::THEME_SLATE, Bootstrap::getThemeConstantByName('slate'));
    }

    /**
     * Test getThemeConstantByName() unknown.
     */
    public function testGetThemeConstantByNameUnknown(): void
    {
        $this->assertNull(Bootstrap::getThemeConstantByName('unknown'));
    }

    /**
     * Setup.
     */
    protected function setUp(): void
    {
        parent::setUp();

        $themeConstant = Bootstrap::THEME_SLATE;
        $this->name = $themeConstant['name'];
        $this->type = $themeConstant['type'];
        $this->theme = $themeConstant['theme'];
        $this->integrity = $themeConstant['integrity'];
    }
}