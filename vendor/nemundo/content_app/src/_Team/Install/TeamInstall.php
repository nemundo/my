<?php

namespace Nemundo\Content\App\Team\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\Content\App\Team\Application\TeamApplication;
use Nemundo\Content\App\Team\Content\Team\TeamContentType;
use Nemundo\Content\App\Team\Data\TeamModelCollection;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;

class TeamInstall extends AbstractInstall
{
    public function install()
    {

        (new ApplicationSetup())
            ->addApplication(new TeamApplication());

        (new ModelCollectionSetup())
            ->addCollection(new TeamModelCollection());

        (new ContentTypeSetup(new TeamApplication()))
            ->addContentType(new TeamContentType());


    }
}