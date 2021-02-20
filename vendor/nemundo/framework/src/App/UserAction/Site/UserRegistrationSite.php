<?php

namespace Nemundo\App\UserAction\Site;


use Nemundo\App\UserAction\Form\UserRegistrationForm;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Web\Site\BaseUrlSite;

class UserRegistrationSite extends AbstractSite
{

    /**
     * @var UserRegistrationSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'User Registration';
        $this->url = 'user-registration';
        $this->menuActive = false;

        UserRegistrationSite::$site = $this;

    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $layout=new BootstrapTwoColumnLayout($page);

        $form = new UserRegistrationForm($layout->col1);
        $form->redirectSite = new BaseUrlSite();

        $page->render();

    }

}