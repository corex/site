<?php

declare(strict_types=1);

namespace Tests\CoRex\Site;

use CoRex\Helpers\Obj;
use CoRex\Site\Config;
use CoRex\Site\Helpers\Bootstrap;
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
     * Test render.
     *
     * @throws \Exception
     */
    public function testRender(): void
    {
        $themeConstant = Bootstrap::THEME_BOOTSTRAP;
        $layout = Layout::load();
        $output = $layout->render();
        $this->assertContains(Bootstrap::bootstrapThemeUrl($themeConstant), $output);
        $this->assertContains(Bootstrap::bootstrapThemeIntegrity($themeConstant), $output);
        $this->assertContains(Bootstrap::bootstrapScriptUrl(), $output);
        $this->assertContains(Bootstrap::bootstrapScriptIntegrity(), $output);
        $this->assertContains(Bootstrap::jQueryScriptUrl(), $output);
        $this->assertContains(Bootstrap::popperScriptUrl(), $output);
        $this->assertContains(Bootstrap::popperScriptIntegrity(), $output);
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
    }
}