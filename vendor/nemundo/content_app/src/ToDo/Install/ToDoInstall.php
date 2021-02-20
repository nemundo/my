<?php

namespace Nemundo\Content\App\ToDo\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\Content\App\ToDo\Application\ToDoApplication;
use Nemundo\Content\App\ToDo\Content\ToDo\ToDoContentType;
use Nemundo\Content\App\ToDo\Data\ToDoModelCollection;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Project\Install\AbstractInstall;

class ToDoInstall extends AbstractInstall
{
    public function install()
    {
        (new ApplicationSetup())->addApplication(new ToDoApplication());
        (new ModelCollectionSetup())->addCollection(new ToDoModelCollection());

        (new ContentTypeSetup(new ToDoApplication()))
            ->addContentType(new ToDoContentType());

    }
}