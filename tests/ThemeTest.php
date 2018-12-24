<?php

declare(strict_types=1);

namespace Tests\CoRex\Site;

use CoRex\Site\Helpers\Bootstrap;
use CoRex\Site\Theme;
use PHPUnit\Framework\TestCase;

class ThemeTest extends TestCase
{
    /**
     * Check mapped constants.
     */
    public function testConstants(): void
    {
        $this->assertEquals(Theme::BOOTSTRAP, Bootstrap::THEME_BOOTSTRAP);
        $this->assertEquals(Theme::CERULEAN, Bootstrap::THEME_CERULEAN);
        $this->assertEquals(Theme::COSMO, Bootstrap::THEME_COSMO);
        $this->assertEquals(Theme::CYBORG, Bootstrap::THEME_CYBORG);
        $this->assertEquals(Theme::DARKLY, Bootstrap::THEME_DARKLY);
        $this->assertEquals(Theme::FLATLY, Bootstrap::THEME_FLATLY);
        $this->assertEquals(Theme::JOURNAL, Bootstrap::THEME_JOURNAL);
        $this->assertEquals(Theme::LITERA, Bootstrap::THEME_LITERA);
        $this->assertEquals(Theme::LUMEN, Bootstrap::THEME_LUMEN);
        $this->assertEquals(Theme::LUX, Bootstrap::THEME_LUX);
        $this->assertEquals(Theme::MATERIA, Bootstrap::THEME_MATERIA);
        $this->assertEquals(Theme::MINTY, Bootstrap::THEME_MINTY);
        $this->assertEquals(Theme::PULSE, Bootstrap::THEME_PULSE);
        $this->assertEquals(Theme::SANDSTONE, Bootstrap::THEME_SANDSTONE);
        $this->assertEquals(Theme::SIMPLEX, Bootstrap::THEME_SIMPLEX);
        $this->assertEquals(Theme::SKETCHY, Bootstrap::THEME_SKETCHY);
        $this->assertEquals(Theme::SLATE, Bootstrap::THEME_SLATE);
        $this->assertEquals(Theme::SOLAR, Bootstrap::THEME_SOLAR);
        $this->assertEquals(Theme::SPACELAB, Bootstrap::THEME_SPACELAB);
        $this->assertEquals(Theme::SUPERHERO, Bootstrap::THEME_SUPERHERO);
        $this->assertEquals(Theme::UNITED, Bootstrap::THEME_UNITED);
        $this->assertEquals(Theme::YETI, Bootstrap::THEME_YETI);
    }
}