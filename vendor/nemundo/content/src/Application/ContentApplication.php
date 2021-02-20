<?php

namespace Nemundo\Content\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Content\Admin\Site\ContentSite;
use Nemundo\Content\Data\ContentModelCollection;
use Nemundo\Content\Install\ContentInstall;

class ContentApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->application = 'Content';
        $this->applicationId = '8d20d52d-8b53-473d-a273-112c9a8638d9';
        $this->modelCollectionClass = ContentModelCollection::class;
        $this->installClass = ContentInstall::class;
        $this->adminSiteClass = ContentSite::class;
    }
}