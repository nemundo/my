<?php

namespace Nemundo\Content\App\Feiertag\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Content\App\Feiertag\Data\FeiertagModelCollection;

class FeiertagApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->application = 'Feiertag';
        $this->applicationId = '47f70d12-135b-4d14-a6db-2c9b7c22e5e5';
        $this->modelCollectionClass = FeiertagModelCollection::class;
    }
}