<?php

namespace Nemundo\Content\App\Chart\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Content\App\Chart\Data\ChartModelCollection;

class ChartApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->application = 'Chart';
        $this->applicationId = '67dca01c-3fb1-4152-915e-c3107dc77757';
        $this->modelCollectionClass = ChartModelCollection::class;
    }
}