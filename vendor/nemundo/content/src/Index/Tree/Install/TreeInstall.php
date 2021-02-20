<?php

namespace Nemundo\Content\Index\Tree\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\Content\Index\Tree\Application\TreeApplication;
use Nemundo\Content\Index\Tree\Data\TreeModelCollection;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Project\Install\AbstractInstall;

class TreeInstall extends AbstractInstall
{
    public function install()
    {
        (new ApplicationSetup())->addApplication(new TreeApplication());
        (new ModelCollectionSetup())->addCollection(new TreeModelCollection());
    }
}