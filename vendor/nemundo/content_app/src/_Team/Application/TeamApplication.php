<?php

namespace Nemundo\Content\App\Team\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Content\App\Team\Data\TeamModelCollection;

class TeamApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->application = 'Team';
        $this->applicationId = '5a4772a4-69f7-4f53-8999-c26d36f58396';
        $this->modelCollectionClass = TeamModelCollection::class;
    }
}