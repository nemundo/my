<?php

namespace Nemundo\Content\Index\Group\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Content\Index\Group\Data\GroupModelCollection;

class GroupApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->application = 'Group';
        $this->applicationId = 'ecb411e8-0fea-4e3b-b342-2217800dfe14';
        $this->modelCollectionClass = GroupModelCollection::class;
    }
}