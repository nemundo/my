<?php

namespace Nemundo\App\Application\Install;

use Nemundo\App\Application\Application\ApplicationApplication;
use Nemundo\App\Application\Data\ApplicationModelCollection;
use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Application\Usergroup\AdminUsergroup;
use Nemundo\App\Application\Usergroup\AppUsergroup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Project\Install\AbstractInstall;
use Nemundo\User\Setup\UsergroupSetup;

class ApplicationInstall extends AbstractInstall
{

    public function install()
    {

        $setup = new ModelCollectionSetup();
        $setup->addCollection(new ApplicationModelCollection());

        $setup = new ApplicationSetup();
        $setup->addApplication(new ApplicationApplication());


        (new UsergroupSetup())
            ->addUsergroup(new AppUsergroup())
            ->addUsergroup(new AdminUsergroup());

    }

}