<?php

namespace Nemundo\Content\App\Text\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\Content\App\Text\Application\TextApplication;
use Nemundo\Content\App\Text\Application\TextContentTypeCollection;
use Nemundo\Content\App\Text\Data\TextCollection;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Project\Install\AbstractInstall;

class TextInstall extends AbstractInstall
{
    public function install()
    {

        (new ApplicationSetup())
            ->addApplication(new TextApplication());

        (new ModelCollectionSetup())
            ->addCollection(new TextCollection());

        (new ContentTypeSetup(new TextApplication()))
            ->addContentTypeCollection(new TextContentTypeCollection());


    }
}