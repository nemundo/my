<?php

namespace My\Web;


use Nemundo\Admin\Template\AdminTemplate;
use Nemundo\Content\Template\DefaultContentTemplate;
use Nemundo\Web\Base\AbstractWeb;
use Nemundo\Web\ResponseConfig;

class MyWeb extends AbstractWeb
{

    public function loadWeb()
    {
        // TODO: Implement loadWeb() method.


        \Nemundo\Admin\AdminConfig::$defaultTemplateClassName = DefaultContentTemplate::class;  // AdminTemplate::class;  // Admin \My\Template\MyTemplate::class;
        \Nemundo\Admin\AdminConfig::$webController = new \My\Controller\MyController();

        ResponseConfig::$title='myNemundo';

        \Nemundo\Admin\AdminConfig::$webController->render();



    }

}