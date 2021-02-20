<?php

require '../../config.php';


class TestTemplateMode extends \Nemundo\Admin\Template\UserModeAdminTemplate
{

    public function getContent()
    {


        return parent::getContent();

    }

}


class TestHomeSite extends \Nemundo\Web\Site\AbstractSite
{

    /**
     * @var TestHomeSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Home';
        $this->url = '';

        TestHomeSite::$site = $this;

    }


    public function loadContent()
    {

        $page = new TestTemplateMode();

        $widget = new \Nemundo\App\UserAction\Widget\LoginWidget($page);
        $widget->redirectSite = TestHomeSite::$site;

        $p = new Nemundo\Html\Paragraph\Paragraph($page);
        $p->content = 'Login:' . (new \Nemundo\User\Session\UserSession())->login;

        $p = new Nemundo\Html\Paragraph\Paragraph($page);
        $p->content = 'User Id:' . (new \Nemundo\User\Session\UserSession())->userId;


        $page->render();

    }


}


class TestController extends \Nemundo\Web\Controller\AbstractWebController
{

    protected function loadController()
    {

        new TestHomeSite($this);
        new \Nemundo\App\UserAdmin\Site\UserAdminSite($this);
        new \Nemundo\App\UserAction\Site\LogoutSite($this);

    }


}

\Nemundo\Web\WebConfig::$webUrl = '/framework/test/Admin/Template/';
\Nemundo\Admin\AdminConfig::$defaultTemplateClassName = \Nemundo\Admin\Template\UserModeAdminTemplate::class;

$controller = new TestController();
\Nemundo\Admin\AdminConfig::$webController = $controller;
$controller->render();
