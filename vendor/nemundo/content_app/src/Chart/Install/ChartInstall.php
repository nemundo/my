<?php

namespace Nemundo\Content\App\Chart\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\Content\App\Chart\Application\ChartApplication;
use Nemundo\Content\App\Chart\Content\Chart\ChartContentType;
use Nemundo\Content\App\Chart\Data\ChartModelCollection;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;

class ChartInstall extends AbstractInstall
{
    public function install()
    {
        (new ApplicationSetup())->addApplication(new ChartApplication());
        (new ModelCollectionSetup())->addCollection(new ChartModelCollection());

        (new ContentTypeSetup(new ChartApplication()))
            ->addContentType(new ChartContentType());

    }
}