<?php

namespace Nemundo\Content\App\WebRadio\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Content\App\WebRadio\Data\WebRadioModelCollection;
use Nemundo\Content\App\WebRadio\Install\WebRadioInstall;

class WebRadioApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->application = 'Web Radio';
        $this->applicationId = 'f041c461-3248-43c2-88b1-8031411ea0a0';
        $this->modelCollectionClass = WebRadioModelCollection::class;
        $this->installClass = WebRadioInstall::class;
    }
}