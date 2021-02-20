<?php

namespace Nemundo\Project\Path;


use Nemundo\Core\Path\AbstractPath;
use Nemundo\Project\Config\ProjectConfigReader;

class CachePath extends AbstractPath
{

    /**
     * @var string
     */
    private static $cachePath;


    protected function loadPath()
    {

        if (CachePath::$cachePath == null) {
            CachePath::$cachePath = (new ProjectConfigReader())->getValue('cache_path');
        }

        $this->addPath(CachePath::$cachePath);

    }

}