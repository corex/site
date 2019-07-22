<?php

declare(strict_types=1);

namespace CoRex\Site;

use CoRex\Site\Base\BaseTemplate;
use CoRex\Template\Helpers\PathEntry;

class Layout extends BaseTemplate
{
    private const TEMPLATE_STANDARD = 'standard';

    /** @var string */
    private $layoutName;

    /**
     * Layout.
     *
     * @param string $layoutName
     * @throws \Exception
     */
    public function __construct(?string $layoutName = null)
    {
        $this->determineLayout($layoutName);
        $this->layoutName = $layoutName;

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
     * Determine layout.
     *
     * @param string $layoutName
     */
    private function determineLayout(?string &$layoutName): void
    {
        // If theme is set, change layout to bootstrap instead of standard.
        if ($layoutName === null) {
            $layoutName = self::TEMPLATE_STANDARD;
        }

        $theme = Bootstrap::getTheme();
        if ($theme === null) {
            return;
        }

        $layoutName = Bootstrap::getLayoutName();
    }

    /**
     * Set base layout variables.
     */
    private function setBaseLayoutVariables(): void
    {
        $theme = Bootstrap::getTheme();
        if ($theme === null) {
            return;
        }

        $themeData = Bootstrap::getThemeData();
        $this->variables($themeData);
    }
}