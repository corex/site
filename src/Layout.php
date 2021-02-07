<?php

declare(strict_types=1);

namespace CoRex\Site;

use CoRex\Site\Base\BaseTemplate;
use CoRex\Template\Exceptions\TemplateException;
use CoRex\Template\Helpers\PathEntry;
use Exception;

class Layout extends BaseTemplate
{
    private const TEMPLATE_STANDARD = 'standard';

    /** @var string */
    private $layoutName;

    /**
     * Layout.
     *
     * @param string|null $layoutName
     * @throws TemplateException
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
     * @param string|null $layoutName If not specified, "standard" is used.
     * @return static
     * @throws Exception
     */
    public static function load(?string $layoutName = null): self
    {
        return new static($layoutName);
    }

    /**
     * Render.
     *
     * @throws Exception
     */
    public function render(): string
    {
        $this->setBaseLayoutVariables();
        return parent::render();
    }

    /**
     * Determine layout.
     *
     * @param string|null $layoutName
     */
    private function determineLayout(?string &$layoutName): void
    {
        // If layout is set, simply return.
        if ($layoutName !== null) {
            return;
        }

        $theme = Bootstrap::getTheme();
        if ($theme !== null) {
            // Set layout to bootstrap.
            $layoutName = Bootstrap::getLayoutName();
        } else {
            // Set standard layout.
            $layoutName = self::TEMPLATE_STANDARD;
        }
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