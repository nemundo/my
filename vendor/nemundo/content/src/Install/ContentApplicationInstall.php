<?php


namespace Nemundo\Content\Install;


use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\Content\App\Calendar\Application\CalendarApplication;
use Nemundo\Content\App\ContentPrint\Application\ContentPrintApplication;
use Nemundo\Content\App\Map\Application\MapApplication;
use Nemundo\Content\App\PublicShare\Application\PublicShareApplication;
use Nemundo\Content\Application\ContentApplication;
use Nemundo\Content\Data\ContentModelCollection;
use Nemundo\Content\Index\Geo\Application\GeoIndexApplication;
use Nemundo\Content\Index\Geo\Install\GeoIndexInstall;
use Nemundo\Content\Index\Group\Install\GroupInstall;
use Nemundo\Content\Index\Log\Application\LogApplication;
use Nemundo\Content\Index\Log\Install\LogInstall;
use Nemundo\Content\Index\Relation\Application\RelationApplication;
use Nemundo\Content\Index\Search\Application\SearchApplication;
use Nemundo\Content\Index\Search\Install\SearchIndexInstall;
use Nemundo\Content\Index\Tree\Application\TreeApplication;
use Nemundo\Content\Index\Tree\Install\TreeInstall;
use Nemundo\Content\Script\ContentCheckScript;
use Nemundo\Content\Script\ContentCleanScript;
use Nemundo\Content\Script\ContentUpdateScript;
use Nemundo\Content\Script\ReIndexScript;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;

class ContentApplicationInstall extends AbstractInstall
{

    public function install()
    {

        (new ApplicationSetup())
            ->addApplication(new TreeApplication())
            ->addApplication(new GeoIndexApplication())
            ->addApplication(new SearchApplication())
            ->addApplication(new CalendarApplication())
            ->addApplication(new LogApplication())
            ->addApplication(new PublicShareApplication())
            ->addApplication(new ContentPrintApplication())
            ->addApplication(new MapApplication())
            ->addApplication(new RelationApplication())
            ->addApplication(new ContentApplication());

    }

}