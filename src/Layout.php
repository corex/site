<?php

declare(strict_types=1);

namespace CoRex\Site;

use CoRex\Site\Base\BaseTemplate;
use CoRex\Site\Helpers\Bootstrap;
use CoRex\Template\Helpers\PathEntry;

class Layout extends BaseTemplate
{
    /**
     * Layout.
     *
     * @param string $layoutName
     * @throws \Exception
     */
    public function __construct(?string $layoutName = null)
    {
        if ($layoutName === null) {
            $layoutName = 'standard';
        }

        // Convert to path entries.
        $pathEntries = [];
        $paths = Config::getLayoutPaths();
        foreach ($paths as $path) {
            $pathEntries[] = new PathEntry($path, 'html');
        }

        parent::__construct($layoutName, null, $pathEntries);
    }

    /**
     * Load.
     *
     * @param string $layoutName If not specified, "standard" is used.
     * @return static
     * @throws \Exception
     */
    public static function load(?string $layoutName = null): self
    {
        return new static($layoutName);
    }

    /**
     * Render.
     *
     * @throws \Exception
     */
    public function render(): string
    {
        $this->setBaseLayoutVariables();
        return parent::render();
    }

    /**
     * Set base layout variables.
     *
     * @throws Exceptions\SiteException
     */
    private function setBaseLayoutVariables(): void
    {
        // Set theme constant,
        $themeConstant = Config::getTheme();
        if ($themeConstant === null) {
            $themeConstant = Bootstrap::THEME_BOOTSTRAP;
        }

        // Set basic layout variables.
        $this->variable('bootstrapThemeUrl', Bootstrap::bootstrapThemeUrl($themeConstant));
        $this->variable('bootstrapThemeIntegrity', Bootstrap::bootstrapThemeIntegrity($themeConstant));
        $this->variable('bootstrapScriptUrl', Bootstrap::bootstrapScriptUrl());
        $this->variable('bootstrapScriptIntegrity', Bootstrap::bootstrapScriptIntegrity());
        $this->variable('jQueryScriptUrl', Bootstrap::jQueryScriptUrl());
        $this->variable('popperScriptUrl', Bootstrap::popperScriptUrl());
        $this->variable('popperScriptIntegrity', Bootstrap::popperScriptIntegrity());
    }
}