<?php

namespace Nemundo\Content\App\Camera\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\Content\App\Camera\Application\CameraApplication;
use Nemundo\Content\App\Camera\Content\Camera\CameraContentType;
use Nemundo\Content\App\Camera\Data\CameraModelCollection;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Project\Install\AbstractInstall;

class CameraInstall extends AbstractInstall
{
    public function install()
    {

        (new ApplicationSetup())
            ->addApplication(new CameraApplication());

        (new ModelCollectionSetup())
            ->addCollection(new CameraModelCollection());

        (new ContentTypeSetup(new CameraApplication()))
            ->addContentType(new CameraContentType());

    }
}