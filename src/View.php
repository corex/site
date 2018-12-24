<?php

declare(strict_types=1);

namespace CoRex\Site;

use CoRex\Site\Base\BaseTemplate;
use CoRex\Template\Helpers\PathEntry;

class View extends BaseTemplate
{
    /**
     * View.
     *
     * @param string $viewName
     * @throws \Exception
     */
    public function __construct(string $viewName)
    {
        // Convert to path entries.
        $pathEntries = [];
        $paths = Config::getViewPaths();
        foreach ($paths as $path) {
            $pathEntries[] = new PathEntry($path, 'html');
        }

        parent::__construct($viewName, null, $pathEntries);
    }

    /**
     * Load.
     *
     * @param string $viewName
     * @return static
     * @throws \Exception
     */
    public static function load(string $viewName): self
    {
        return new static($viewName);
    }
}