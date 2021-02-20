<?php

namespace Nemundo\Model\Clean;


use Nemundo\Project\Install\AbstractInstall;

class DatabaseModelClean extends AbstractDatabaseModelClean
{

    public function addInstall(AbstractInstall $install)
    {
        parent::addInstall($install);
    }


}