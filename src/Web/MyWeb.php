<?php

namespace My\Web;


use Nemundo\Web\Base\AbstractWeb;

class MyWeb extends AbstractWeb
{

    public function loadWeb()
    {
        // TODO: Implement loadWeb() method.


\Nemundo\Admin\AdminConfig::$defaultTemplateClassName = \My\Template\MyTemplate::class;
\Nemundo\Admin\AdminConfig::$webController = new \My\Controller\MyController();

        \Nemundo\Admin\AdminConfig::$webController->render();



    }

}