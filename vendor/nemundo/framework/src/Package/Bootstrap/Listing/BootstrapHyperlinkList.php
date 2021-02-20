<?php

namespace Nemundo\Package\Bootstrap\Listing;


use Nemundo\Com\Html\Hyperlink\SiteHyperlink;
use Nemundo\Com\Html\Hyperlink\UrlHyperlink;
use Nemundo\Com\Item\TitleTextUrlItem;
use Nemundo\Html\Container\AbstractContainer;
use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Html\Hyperlink\Hyperlink;
use Nemundo\Html\Listing\Li;
use Nemundo\Web\Site\AbstractSite;


// SiteList
class BootstrapHyperlinkList extends BootstrapList  // AbstractHtmlContainer
{

    /**
     * @var TitleTextUrlItem[]
     */
    //private $list = [];


    /*
    protected function loadContainer()
    {
        parent::loadContainer();

        $this->tagName = 'div';
        $this->addCssClass('list-group');

    }*/


    /**
     * @param AbstractContainer|AbstractHtmlContainer $container
     */
    /*public function addContainer(AbstractContainer $container)
    {

        $container->addCssClass('list-group-item');
        parent::addContainer($container);

    }*/


    public function addHyperlink($label, $url = '#')
    {

        $li = new Li($this);
        $li->addCssClass('list-group-item');

        $hyperlink = new UrlHyperlink($li);
        $hyperlink->content = $label;
        $hyperlink->url = $url;

        return $this;
    }


    /*
    public function addSite(AbstractSite $site)
    {

        $hyperlink = new SiteHyperlink($this);
        $hyperlink->addCssClass('list-group-item-action');
        $hyperlink->site = $site;

    }*/


    public function addActiveHyperlink($label)
    {

        $li = new Li($this);
        $li->addCssClass('list-group-item');

        $hyperlink = new Hyperlink($li);
        $hyperlink->addCssClass('list-group-item active');
        $hyperlink->content = $label;

    }

}