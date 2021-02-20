<?php


namespace Nemundo\Content\Install;


use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\Content\Application\ContentApplication;
use Nemundo\Content\Data\ContentModelCollection;
use Nemundo\Content\Index\Geo\Install\GeoIndexInstall;
use Nemundo\Content\Index\Group\Install\GroupInstall;
use Nemundo\Content\Index\Log\Install\LogInstall;
use Nemundo\Content\Index\Search\Application\SearchApplication;
use Nemundo\Content\Index\Search\Install\SearchIndexInstall;
use Nemundo\Content\Index\Tree\Application\TreeApplication;
use Nemundo\Content\Index\Tree\Install\TreeInstall;
use Nemundo\Content\Script\ContentCheckScript;
use Nemundo\Content\Script\ContentCleanScript;
use Nemundo\Content\Script\ContentUpdateScript;
use Nemundo\Content\Script\ReIndexScript;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Project\Install\AbstractInstall;

class ContentInstall extends AbstractInstall
{

    public function install()
    {

        (new ApplicationSetup())
            ->addApplication(new ContentApplication());

        (new ModelCollectionSetup())
            ->addCollection(new ContentModelCollection());

        (new ScriptSetup(new ContentApplication()))
            ->addScript(new ReIndexScript())
            ->addScript(new ContentUpdateScript())
            ->addScript(new ContentCleanScript())
            ->addScript(new ContentCheckScript());


        (new SearchApplication())->installApp();
        (new TreeApplication())->installApp();

        //(new TreeInstall())->install();
        //(new SearchIndexInstall())->install();
        (new GeoIndexInstall())->install();
        //(new GroupInstall())->install();
        (new LogInstall())->install();

    }

}