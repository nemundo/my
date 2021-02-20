<?php

namespace Nemundo\Content\App\Log\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Content\App\Log\Data\LogModelCollection;

class LogApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->application = 'Log';
        $this->applicationId = '06ca7732-d067-47bf-9c3d-0b6cfdbcf0ac';
        $this->modelCollectionClass=LogModelCollection::class;
    }
}