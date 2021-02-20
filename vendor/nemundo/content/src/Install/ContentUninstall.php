<?php


namespace Nemundo\Content\Install;


use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Content\Data\ContentCollection;
use Nemundo\Project\Install\AbstractInstall;
use Nemundo\Project\Install\AbstractUninstall;

class ContentUninstall extends AbstractUninstall
{

    public function uninstall()
    {
        $setup = new ModelCollectionSetup();
        $setup->removeCollection(new ContentCollection());
    }

}