<?php

namespace Nemundo\Content\App\ToDo\Application;

use Nemundo\App\Application\Type\AbstractApplication;

class ToDoApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->application = 'ToDo';
        $this->applicationId = '92db70f8-6790-495c-8aa8-86a86e338a70';
    }
}