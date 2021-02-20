<?php

namespace Nemundo\Package\Bootstrap\Navbar;


use Nemundo\Blog\Site\BlogSite;
use Nemundo\Com\Html\Listing\UnorderedList;
use Nemundo\Html\Block\Div;
use Nemundo\Html\Container\AbstractContainer;
use Nemundo\Html\Container\Container;
use Nemundo\Html\Layout\Nav;


class BootstrapNavbar extends Nav
{

    /**
     * @var bool
     */
    public $fixed = false;

    /**
     * @var Div
     */
    protected $containerDiv;


    protected $navbarNavUl;


    protected function loadContainer()
    {

        parent::loadContainer();

        $this->containerDiv = new Div();
        $this->containerDiv->addCssClass('container-fluid');

        $div = new Div($this->containerDiv);
        $div->id = 'navbarNavDropdown';
        $div->addCssClass('collapse navbar-collapse');

        $this->navbarNavUl = new UnorderedList($div);
        $this->navbarNavUl->addCssClass('navbar-nav');



        parent::addContainer($this->containerDiv);

    }

    public function getContent()
    {

        $this->addCssClass('navbar');
        $this->addCssClass('navbar-expand-lg');

        //$this->addCssClass('navbar-dark bg-dark');
        $this->addCssClass('navbar-light bg-light');

        if ($this->fixed) {
            $this->addCssClass('fixed-top');
        }


        /*$div = new Div($this);
        $div->addCssClass('collapse navbar-collapse');

        $ul = new UnorderedList($div);
        $ul->addCssClass('navbar-nav');
*/

        /*
        $li = new BootstrapNavItemLi($ul);

        $link = new BootstrapNavLink($li);
        $link->site = BlogSite::$site;
*/

        /*
        $container = new Container($this);
        $container->addContent(' <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
        <li class="nav-item">

          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>


        </li>
      </ul>
    </div>');*/



        /*
        $toggler = new BootstrapNavbarToggler();
        $this->addContainer($toggler);*/

        return parent::getContent();

    }




    public function addContainer(AbstractContainer $container)
    {

        $this->containerDiv->addContainer($container);

    }

}