<?php

namespace Nemundo\Content\Index\Tree\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Content\Index\Tree\Data\TreeModelCollection;
use Nemundo\Content\Index\Tree\Install\TreeInstall;
use Nemundo\Content\Index\Tree\Site\TreeAdminSite;
use Nemundo\Content\Index\Tree\Site\TreeSite;

class TreeApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->application = 'Tree';
        $this->applicationId = 'fa2aff01-5c1d-4aa0-89b1-23de36ea6230';
        $this->modelCollectionClass = TreeModelCollection::class;
        $this->installClass = TreeInstall::class;
        $this->siteClass=TreeSite::class;
        $this->adminSiteClass = TreeAdminSite::class;
    }
}