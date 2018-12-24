<?php

declare(strict_types=1);

namespace Tests\CoRex\Site;

use CoRex\Helpers\Obj;
use CoRex\Site\Config;
use CoRex\Site\View;
use CoRex\Template\Helpers\Engine;
use PHPUnit\Framework\TestCase;

class ViewTest extends TestCase
{
    /**
     * Test.
     *
     * @throws \Exception
     */
    public function testConstructor(): void
    {
        $view = new View('test');
        $this->assertEquals('test', Obj::getProperty('templateName', $view, null, Engine::class));
    }

    /**
     * Test load.
     *
     * @throws \Exception
     */
    public function testLoad(): void
    {
        $view = View::load('test');
        $this->assertEquals('test', Obj::getProperty('templateName', $view, null, Engine::class));
    }

    /**
     * Setup.
     *
     * @throws \ReflectionException
     */
    protected function setUp(): void
    {
        parent::setUp();
        Obj::setProperty('viewPaths', null, null, Config::class);
    }
}