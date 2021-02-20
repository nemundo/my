<?php

namespace Nemundo\Admin\Web;


use Nemundo\Admin\AdminConfig;
use Nemundo\Admin\Controller\AdminController;
use Nemundo\Admin\Template\AdminTemplate;
use Nemundo\Core\Base\AbstractBase;


class AdminWeb extends AbstractBase
{

    public function startWeb()
    {

        $controller = new AdminController();

        AdminConfig::$webController = $controller;
        AdminConfig::$defaultTemplateClassName = AdminTemplate::class;

        $controller->render();

    }

}