<?php


namespace Nemundo\Content\App\Widget\Install;


use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\Content\App\Widget\Application\WidgetApplication;
use Nemundo\Content\App\Widget\Content\Clock\ClockContentType;
use Nemundo\Content\App\Widget\Content\UniqueId\UniqueIdContentType;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Project\Install\AbstractInstall;

class WidgetInstall extends AbstractInstall
{

    public function install()
    {

        (new ApplicationSetup())
        ->addApplication(new WidgetApplication());

        (new ContentTypeSetup(new WidgetApplication()))
            ->addContentType(new ClockContentType())
            ->addContentType(new UniqueIdContentType());

        (new ClockContentType())->saveType();
        (new UniqueIdContentType())->saveType();



    }

}