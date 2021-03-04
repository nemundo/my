<?php

namespace Nemundo\Content\App\Text\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\Content\App\Text\Application\TextApplication;
use Nemundo\Content\App\Text\Application\TextContentTypeCollection;
use Nemundo\Content\App\Text\Data\TextCollection;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\App\Application\Type\Install\AbstractUninstall;

class TextUninstall extends AbstractUninstall
{



    public function uninstall()
    {




        (new ContentTypeSetup(new TextApplication()))
            ->removeContentTypeCollection(new TextContentTypeCollection());


        (new ModelCollectionSetup())
            ->removeCollection(new TextCollection());

    }
}