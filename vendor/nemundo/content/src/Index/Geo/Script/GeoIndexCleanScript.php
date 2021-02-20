<?php

namespace Nemundo\Content\Index\Geo\Script;

use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Content\Index\Geo\Data\GeoCollection;
use Nemundo\Content\Index\Geo\Install\GeoIndexInstall;
use Nemundo\Model\Setup\ModelCollectionSetup;

class GeoIndexCleanScript extends AbstractConsoleScript
{
    protected function loadScript()
    {
        $this->scriptName = 'geoindex-clean';
    }

    public function run()
    {

        (new ModelCollectionSetup())
            ->removeCollection(new GeoCollection());

        (new GeoIndexInstall())->install();


    }
}