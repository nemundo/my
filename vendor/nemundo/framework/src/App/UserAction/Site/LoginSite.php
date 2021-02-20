<?php

namespace Nemundo\App\UserAction\Site;


use Nemundo\App\UserAction\Form\LoginForm;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\Bootstrap\Layout\BootstrapThreeColumnLayout;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Web\Site\BaseUrlSite;
use Nemundo\Web\WebConfig;

class LoginSite extends AbstractSite
{

    protected function loadSite()
    {
        $this->title = 'Login';
        $this->url = 'login';
    }


    public function loadContent()
    {


        $page = (new DefaultTemplateFactory())->getDefaultTemplate();


        $layout = new BootstrapThreeColumnLayout($page);

        $form = new LoginForm($layout->col2);
        $form->redirectSite = new BaseUrlSite();
        //$form->redirectUrl = WebConfig::$webUrl;
        $form->showForgotHyperlink = true;


        //$form->redirectSite = new Site();


        $page->render();

    }

}