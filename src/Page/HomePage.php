<?php

namespace My\Page;

use My\Template\MyTemplate;
use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\Admin\Template\AdminTemplate;
use Nemundo\Admin\UniqueId\Widget\UniqueIdAdminWidget;
use Nemundo\App\UserAction\Widget\LoginWidget;
use Nemundo\App\UserAction\Widget\UserChangeWidget;
use Nemundo\Content\App\Explorer\Site\ExplorerSite;
use Nemundo\Html\Heading\H2;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\User\Session\UserSession;

class HomePage extends AdminTemplate  // MyTemplate
{
    public function getContent()
    {


        $this->navbar->searchMode=false;

        $layout = new BootstrapTwoColumnLayout($this);
        $layout->col1->columnWidth = 8;
        $layout->col2->columnWidth = 4;

        if ((new UserSession())->isUserLogged()) {

            //(new HomeRightDashboardContentType())->fromUniqueName()->getDefaultView($layout->col2);

        } else {


            $widget= new LoginWidget($layout->col2);
            $widget->redirectSite = ExplorerSite::$site;
           // $widget->

        }







        return parent::getContent();
    }
}