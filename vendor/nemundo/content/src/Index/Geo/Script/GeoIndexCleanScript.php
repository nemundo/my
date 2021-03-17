<?php

namespace Nemundo\Content\Index\Geo\Script;

use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Content\Index\Geo\Application\GeoIndexApplication;

class GeoIndexCleanScript extends AbstractConsoleScript
{
    protected function loadScript()
    {
        $this->scriptName = 'geoindex-clean';
    }

    public function run()
    {

        (new GeoIndexApplication())->reinstallApp();

    }
}