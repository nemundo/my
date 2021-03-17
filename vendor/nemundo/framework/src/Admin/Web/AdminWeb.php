<?php

namespace Nemundo\Admin\Web;


use Nemundo\Admin\AdminConfig;
use Nemundo\Admin\Controller\AdminController;
use Nemundo\Admin\Template\AdminTemplate;
use Nemundo\Web\Base\AbstractWeb;
use Nemundo\Web\ResponseConfig;


class AdminWeb extends AbstractWeb
{

    public function loadWeb()
    {

        $controller = new AdminController();

        AdminConfig::$webController = $controller;
        AdminConfig::$defaultTemplateClassName = AdminTemplate::class;
        ResponseConfig::$title = 'Admin';

        $controller->render();

    }

}