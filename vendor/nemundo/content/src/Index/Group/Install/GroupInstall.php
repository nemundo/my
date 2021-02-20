<?php


namespace Nemundo\Content\Index\Group\Install;


use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\Content\Index\Group\Application\GroupApplication;
use Nemundo\Content\Index\Group\Data\GroupModelCollection;
use Nemundo\Content\Index\Group\Script\GroupUpdateScript;
use Nemundo\Content\Index\Group\Setup\GroupSetup;
use Nemundo\Content\Index\Group\User\UserContentType;
use Nemundo\Content\Index\Group\User\UsergroupContentType;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Project\Install\AbstractInstall;


class GroupInstall extends AbstractInstall
{

    public function install()
    {

        (new ApplicationSetup())
            ->addApplication(new GroupApplication());

        (new ModelCollectionSetup())
            ->addCollection(new GroupModelCollection());


        (new GroupSetup())
            ->addGroupType(new UserContentType())
            ->addGroupType(new UsergroupContentType());

        (new ScriptSetup())
            ->addScript(new GroupUpdateScript());


        /*
        (new GroupSetup())
            ->addGroupType(new GroupContentType())
            ->addGroupType(new UserGroupType());


        /*
        (new ScriptSetup())
            ->addScript(new GroupCleanScript());

        $setup = new ScriptSetup();
        $setup->addScript(new GroupCheckScript());
        $setup->addScript(new GroupTestScript());*/

    }

}