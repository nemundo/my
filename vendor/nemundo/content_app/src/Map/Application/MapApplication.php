<?php

namespace Nemundo\Content\App\Map\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Content\App\Map\Data\MapModelCollection;
use Nemundo\Content\App\Map\Install\MapInstall;

class MapApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->application = 'Map';
        $this->applicationId = '43426e9e-1a06-4439-9e39-2a056dc182a9';
        $this->modelCollectionClass = MapModelCollection::class;
        $this->installClass = MapInstall::class;
    }
}