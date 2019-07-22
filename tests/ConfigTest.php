<?php

declare(strict_types=1);

namespace Tests\CoRex\Site;

use CoRex\Helpers\Obj;
use CoRex\Site\Bootstrap;
use CoRex\Site\Config;
use CoRex\Site\Exceptions\BootstrapException;
use CoRex\Site\Theme;
use PHPUnit\Framework\TestCase;

class ConfigTest extends TestCase
{
    /** @var int */
    private $randomNumber;

    /** @var string */
    private $randomString;

    /**
     * Test setLayoutPath() and getLayoutPaths().
     *
     * @throws \ReflectionException
     */
    public function testSetLayoutPathAndGetLayoutPaths(): void
    {
        Obj::setProperty('layoutPaths', null, null, Config::class);

        $this->assertEquals(Config::getLayoutPaths(), [Config::getDefaultLayoutPath()]);

        Config::setLayoutPath($this->randomString);

        $this->assertEquals(Config::getLayoutPaths(), [
            Config::getDefaultLayoutPath(),
            $this->randomString
        ]);
    }

    /**
     * Test setViewPath() and getViewPaths().
     *
     * @throws \ReflectionException
     */
    public function testSetViewPathAndGetViewPaths(): void
    {
        Obj::setProperty('viewPaths', null, null, Config::class);

        $this->assertEquals(Config::getViewPaths(), [Config::getDefaultViewPath()]);

        Config::setViewPath($this->randomString);

        $this->assertEquals(Config::getViewPaths(), [
            Config::getDefaultViewPath(),
            $this->randomString
        ]);
    }

    /**
     * Test setTheme().
     *
     * @throws BootstrapException
     */
    public function testSetThemeAndGetTheme(): void
    {
        Bootstrap::clearTheme();
        $this->assertNull(Bootstrap::getTheme());
        Config::setTheme(Theme::SLATE);
        $this->assertEquals(Bootstrap::THEME_SLATE, Bootstrap::getTheme());
    }

    /**
     * Setup.
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->randomNumber = mt_rand(1, 100000);
        $this->randomString = md5((string)$this->randomNumber);
    }
}