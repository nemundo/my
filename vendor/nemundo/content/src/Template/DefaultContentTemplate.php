<?php


namespace Nemundo\Content\Template;


use Nemundo\Admin\AdminConfig;
use Nemundo\Admin\Com\Navbar\AdminSiteNavbar;
use Nemundo\Content\Com\Navbar\ContentSiteNavbar;
use Nemundo\Html\Container\AbstractContainer;
use Nemundo\Package\Bootstrap\Document\BootstrapDocument;
use Nemundo\Package\Bootstrap\Layout\Container\BootstrapContainer;
use Nemundo\Package\FontAwesome\FontAwesomePackage;
use Nemundo\Package\Jquery\Container\JqueryHeader;
use Nemundo\Package\Jquery\Package\JqueryPackage;
use Nemundo\Package\NemundoJs\NemundoJsPackage;
use Nemundo\Package\OpenGraph\OpenGraph;
use Nemundo\Package\TwitterCard\TwitterCard;
use Nemundo\Web\ResponseConfig;
use Nemundo\Web\WebConfig;

class DefaultContentTemplate extends BootstrapDocument
{

    /**
     * @var BootstrapContainer
     */
    private $container;

    /**
     * @var AdminSiteNavbar
     */
    protected $navbar;


    protected function loadContainer()
    {

        $this->addPackage(new NemundoJsPackage());
        $this->addPackage(new JqueryPackage());
        $this->addPackage(new FontAwesomePackage());

        $this->addJavaScript('WebConfig.webUrl = "' . WebConfig::$webUrl . '";');

        $this->navbar = new ContentSiteNavbar();
        $this->navbar->showPasswordChange=false;
        //$this->navbar->logoUrl = WebConfig::$webUrl . 'img/logo.png';
        $this->navbar->brand= ResponseConfig::$title;
        $this->navbar->site = AdminConfig::$webController;
        $this->navbar->searchMode=false;

        parent::addContainer($this->navbar);

        $this->container = new BootstrapContainer();
        $this->container->fullWidth = true;

        parent::addContainer($this->container);

        parent::loadContainer();

        //$this->title = ResponseConfig::$title;  // AdminConfig::$pageTitle;

    }


    public function addContainer(AbstractContainer $container)
    {
        $this->container->addContainer($container);
    }


    public function getContent()
    {

        new JqueryHeader($this);

        //$this->addCssUrl(WebConfig::$webUrl . 'css/style.css');




        $this->title = ResponseConfig::$title;

        new OpenGraph($this);
        new TwitterCard($this);

        return parent::getContent();

    }

}