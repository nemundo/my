<?php

namespace Nemundo\Content\App\Log\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\Content\App\Log\Application\LogApplication;
use Nemundo\Content\App\Log\Content\LogMessage\LogMessageContentType;
use Nemundo\Content\App\Log\Data\LogModelCollection;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;

class LogInstall extends AbstractInstall
{
    public function install()
    {

        (new ApplicationSetup())
            ->addApplication(new LogApplication());

        (new ModelCollectionSetup())
            ->addCollection(new LogModelCollection());

        (new ContentTypeSetup(new LogApplication()))
            ->addContentType(new LogMessageContentType());

    }
}