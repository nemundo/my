<?php


namespace Nemundo\Content\App\Dashboard\Install;


use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\Content\App\Dashboard\Application\DashboardApplication;
use Nemundo\Content\App\Dashboard\Content\Dashboard\DashboardContentType;
use Nemundo\Content\App\Dashboard\Content\DashboardColumn\DashboardColumnContentType;
use Nemundo\Content\App\Dashboard\Content\UserDashboard\UserDashboardContentType;
use Nemundo\Content\App\Dashboard\Data\DashboardModelCollection;
use Nemundo\Content\App\Dashboard\Script\DashboardCleanScript;
use Nemundo\Content\App\Dashboard\Usergroup\DashboardAdministratorUsergroup;
use Nemundo\Content\Index\Tree\Setup\RestrictedContentTypeSetup;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Project\Install\AbstractInstall;
use Nemundo\User\Setup\UsergroupSetup;


class DashboardInstall extends AbstractInstall
{

    public function install()
    {

        (new ApplicationSetup())
            ->addApplication(new DashboardApplication());

        (new ModelCollectionSetup())
            ->addCollection(new DashboardModelCollection());

        (new ScriptSetup(new DashboardApplication()))
            ->addScript(new DashboardCleanScript());

        (new UsergroupSetup())
            ->addUsergroup(new DashboardAdministratorUsergroup());

        (new ContentTypeSetup(new DashboardApplication()))
            ->addContentType(new DashboardContentType())
            ->addContentType(new DashboardColumnContentType())
            ->addContentType(new UserDashboardContentType());

        (new RestrictedContentTypeSetup(new DashboardContentType()))
            ->addRestrictedContentType(new DashboardColumnContentType());


    }

}