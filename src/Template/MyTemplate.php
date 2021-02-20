<?php

namespace My\Template;

use Nemundo\Admin\AdminConfig;
use Nemundo\Admin\Com\Navbar\AdminSiteNavbar;
use Nemundo\Content\Com\Navbar\ContentSiteNavbar;
use Nemundo\Html\Container\AbstractContainer;
use Nemundo\Package\Bootstrap\Document\BootstrapDocument;
use Nemundo\Package\Bootstrap\Layout\Container\BootstrapContainer;
use Nemundo\Package\FontAwesome\FontAwesomePackage;
use Nemundo\Package\Jquery\Container\JqueryHeader;
use Nemundo\Package\Jquery\Package\JqueryPackage;
use Nemundo\Package\JqueryUi\JqueryUiPackage;
use Nemundo\Package\NemundoJs\NemundoJsPackage;
use Nemundo\Web\WebConfig;

class MyTemplate extends BootstrapDocument
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
        $this->addPackage(new JqueryUiPackage());
        $this->addPackage(new FontAwesomePackage());

        $this->addJavaScript('WebConfig.webUrl = "' . WebConfig::$webUrl . '";');

        $this->navbar = new ContentSiteNavbar();
        $this->navbar->site = AdminConfig::$webController;
        parent::addContainer($this->navbar);

        $this->container = new BootstrapContainer();
        $this->container->fullWidth = true;
        parent::addContainer($this->container);

        parent::loadContainer();

        $this->title = AdminConfig::$pageTitle;

    }


    public function addContainer(AbstractContainer $container)
    {
        $this->container->addContainer($container);
    }


    public function getContent()
    {

        if ($this->title == null) {
            $this->title = 'Dev';  // AdminConfig::$pageTitle;
        }

        new JqueryHeader($this);

        return parent::getContent();

    }


}