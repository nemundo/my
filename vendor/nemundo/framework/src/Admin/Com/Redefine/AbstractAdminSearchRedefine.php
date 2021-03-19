<?php

namespace Nemundo\Admin\Com\Redefine;


use Nemundo\Admin\Com\Button\AdminIconSiteButton;
use Nemundo\Com\Container\LibraryTrait;
use Nemundo\Com\Html\Hyperlink\SiteHyperlink;
use Nemundo\Core\Type\Number\Number;
use Nemundo\Html\Block\Div;
use Nemundo\Html\Heading\H5;
use Nemundo\Package\Bootstrap\Listing\BootstrapBadge;
use Nemundo\Package\Bootstrap\Listing\BootstrapHyperlinkList;
use Nemundo\Web\Site\AbstractSite;
use Paranautik\Xcontest\Data\Flight\FlightReader;
use Paranautik\Xcontest\Search\FlightSearchSiteBuilder;
use Paranautik\Xcontest\Site\Search\AbstractRemoveParameterSite;


// AdminRedefineCard
abstract class AbstractAdminSearchRedefine extends Div
{

    use LibraryTrait;

    public $searchTopic;

    public $limit = 10;

    public $value;

    /**
     * @var bool
     */
    public $hideAtStartup = true;

    /**
     * @var bool
     */
    public $hideIfEmpty = false;

    /**
     * @var bool
     */
    public $showClearButton=false;


    /**
     * @var AbstractSite
     */
    public static $site;

    /**
     * @var bool
     */
    public static $mobileVersion = false;

    /**
     * @var AbstractRemoveParameterSite
     */
    protected $removeSite;

    /**
     * @var AdminIconSiteButton
     */
    private $removeButton;

    /**
     * @var BootstrapHyperlinkList
     */
    private $hyperlinkList;

    /**
     * @var Div
     */
    private $titleDiv;

    /**
     * @var Div
     */
    private $contentDiv;

    /**
     * @var H5
     */
    private $h5;

    /**
     * @var FlightReader
     */
    //protected $flightReader;

    protected function loadContainer()
    {

        parent::loadContainer();

        $this->addCssClass('list-group');
        $this->addCssClass('mb-3');

        $this->titleDiv = new Div($this);
        $this->titleDiv->addCssClass('list-group-item');
        $this->titleDiv->addCssClass('list-group-item-secondary');

        $this->h5 = new H5($this->titleDiv);

        $this->contentDiv = new Div($this);


    }


    public function getContent()
    {

        /*
        $this->hideAtStartup = AbstractRedefineCard::$mobileVersion;

        if ($this->flightReader->getCount() ==0) {
            $this->visible=false;
        }*/


        $this->h5->content = $this->searchTopic;

        $this->titleDiv->id = $this->id . '-title';
        $this->contentDiv->id = $this->id . '-content';

        if ($this->hideAtStartup) {
            $this->addStyle('#' . $this->contentDiv->id . ' {');
            $this->addStyle('display: none;');
            $this->addStyle('}');
        }

        $this->addJqueryScript('$("#' . $this->titleDiv->id . '").click(function(){');
        $this->addJqueryScript('$("#' . $this->contentDiv->id . '").toggle();');
        $this->addJqueryScript('});');



        
        //$this->removeButton = new AdminIconSiteButton($this);  // ($this->titleDiv);
        //$this->removeButton->site = (new FlightSearchSiteBuilder())->getSite($this->removeSite);



        return parent::getContent();

    }


    protected function addItemSite(AbstractSite $site, $count = 0)
    {

        $hyperlink = new SiteHyperlink($this->contentDiv);
        $hyperlink->addCssClass('list-group-item d-flex justify-content-between align-items-center list-group-item-action');
        $hyperlink->site = $site;

        $badge = new BootstrapBadge($hyperlink);
        $badge->content = (new Number($count))->formatNumber();

    }

}