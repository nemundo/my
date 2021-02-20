<?php

namespace Nemundo\User\Install;


use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Project\Install\AbstractUninstall;
use Nemundo\User\Data\UserModelCollection;

class UserUninstall extends AbstractUninstall
{

    public function uninstall()
    {


        (new ModelCollectionSetup())
            ->removeCollection(new UserModelCollection());

    }

}