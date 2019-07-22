<?php

declare(strict_types=1);

namespace Tests\CoRex\Site;

use CoRex\Helpers\Obj;
use CoRex\Site\Bootstrap;
use CoRex\Site\Config;
use CoRex\Site\Exceptions\BootstrapException;
use CoRex\Site\Layout;
use CoRex\Template\Helpers\Engine;
use PHPUnit\Framework\TestCase;

class LayoutTest extends TestCase
{
    /**
     * Test.
     *
     * @throws \Exception
     */
    public function testConstructor(): void
    {
        $layout = new Layout();
        $this->assertEquals('standard', Obj::getProperty('templateName', $layout, null, Engine::class));
    }

    /**
     * Test load.
     *
     * @throws \Exception
     */
    public function testLoad(): void
    {
        $layout = Layout::load();
        $this->assertEquals('standard', Obj::getProperty('templateName', $layout, null, Engine::class));
    }

    /**
     * Test render standard template.
     *
     * @throws \Exception
     */
    public function testRenderStandard(): void
    {
        Bootstrap::clearTheme();
        $layout = Layout::load();
        $output = $layout->render();
        $this->assertStringNotContainsString('bootstrapcdn', $output);
    }

    /**
     * Test render bootstrap.
     *
     * @throws BootstrapException
     * @throws \Exception
     */
    public function testRenderBootstrap(): void
    {
        $themes = Bootstrap::getThemes();
        foreach ($themes as $theme) {
            Bootstrap::setTheme($theme);
            $layout = Layout::load();
            $output = $layout->render();

            $themeData = Bootstrap::getThemeData();
            $this->assertStringContainsString('bootstrapcdn', $output);
            $this->assertStringContainsString($themeData['provider'], $output);
            $this->assertStringContainsString($themeData['theme'], $output);
            $this->assertStringContainsString($themeData['integrity'], $output);
        }
    }

    /**
     * Setup.
     *
     * @throws \ReflectionException
     */
    protected function setUp(): void
    {
        parent::setUp();
        Obj::setProperty('layoutPaths', null, null, Config::class);
        Obj::setProperty('themeConstant', null, null, Config::class);
        Bootstrap::clearTheme();
        Bootstrap::clearVersion();
    }
}