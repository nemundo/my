<?php

namespace Nemundo\Admin\Template;

use Nemundo\Admin\AdminConfig;
use Nemundo\Admin\Com\Navbar\AdminSiteNavbar;
use Nemundo\Html\Container\AbstractContainer;
use Nemundo\Package\Bootstrap\Document\BootstrapDocument;
use Nemundo\Package\Bootstrap\Layout\Container\BootstrapContainer;
use Nemundo\Package\Bootstrap\Navbar\BootstrapNavbarLogo;
use Nemundo\Package\Bootstrap\Navbar\BootstrapSiteNavbar;
use Nemundo\Package\FontAwesome\FontAwesomePackage;
use Nemundo\Package\Jquery\Container\JqueryHeader;
use Nemundo\Package\Jquery\Package\JqueryPackage;
use Nemundo\Package\NemundoJs\NemundoJsPackage;
use Nemundo\Package\OpenGraph\OpenGraph;
use Nemundo\Package\TwitterCard\TwitterCard;
use Nemundo\Web\ResponseConfig;
use Nemundo\Web\Site\BaseUrlSite;
use Nemundo\Web\WebConfig;

class AdminTemplate extends BootstrapDocument
{

    /**
     * @var BootstrapContainer
     */
    private $container;

    /**
     * @var BootstrapSiteNavbar
     */
    protected $navbar;


    protected function loadContainer()
    {

        $this->addPackage(new NemundoJsPackage());
        $this->addPackage(new JqueryPackage());
        $this->addPackage(new FontAwesomePackage());

        $this->addJavaScript('WebConfig.webUrl = "' . WebConfig::$webUrl . '";');

        $this->navbar = new AdminSiteNavbar();  // new BootstrapSiteNavbar();
        $this->navbar->site = AdminConfig::$webController;
        $this->navbar->userMode = AdminConfig::$userMode;  // false;

        $this->navbar->showPasswordChange= AdminConfig::$showPasswordChange;  // false;

        if (AdminConfig::$logoUrl !== null) {
            $logo = new BootstrapNavbarLogo($this->navbar);
            $logo->logoSite = new BaseUrlSite();
            $logo->logoUrl = AdminConfig::$logoUrl;
        } else {
            $this->navbar->brand = ResponseConfig::$title;
        }

        parent::addContainer($this->navbar);

        $this->container = new BootstrapContainer();
        $this->container->fullWidth = true;
        parent::addContainer($this->container);

        parent::loadContainer();

        //$this->title = AdminConfig::$pageTitle;

    }


    public function addContainer(AbstractContainer $container)
    {
        $this->container->addContainer($container);
    }


    public function getContent()
    {

        if ($this->title == null) {
            $this->title = ResponseConfig::$title;  // AdminConfig::$pageTitle;
        }

        new JqueryHeader($this);

        new OpenGraph($this);
        new TwitterCard($this);

        return parent::getContent();

    }

}