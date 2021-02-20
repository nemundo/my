<?php


namespace Nemundo\Content\Index\Search\Site;


use Nemundo\Admin\Com\Button\AdminIconSiteButton;
use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Table\AdminLabelValueTable;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Com\Html\Listing\UnorderedList;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Html\Block\Div;
use Nemundo\Package\Bootstrap\Dropdown\BootstrapSiteDropdown;
use Nemundo\Content\Index\Content\Data\Content\ContentReader;
use Nemundo\Content\Index\Content\Data\ContentGroup\ContentGroupReader;
use Nemundo\Content\Index\Content\Data\ContentType\ContentTypeReader;
use Nemundo\Content\Index\Content\Parameter\ContentParameter;
use Nemundo\Content\Index\Content\Parameter\ContentTypeParameter;

use Nemundo\Content\Index\Content\Type\MenuTrait;
use Nemundo\Web\Site\AbstractSite;

class SearchItemSite extends AbstractSite
{

    /**
     * @var SearchItemSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->url = 'search-item';
        $this->menuActive = false;
        SearchItemSite::$site = $this;

    }

    public function loadContent()
    {


        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $contentParameter=new ContentParameter();
        $contentParameter->contentTypeCheck=false;
        $contentType=$contentParameter->getContentType();


        if ($contentType->hasView()) {
            $contentType->getView($page);
        } else {

            $title = new AdminTitle($page);
            $title->content = $contentType->getSubject();

        }


        $table = new AdminLabelValueTable($page);

        $table->addLabelValue('Subject', $contentType->getSubject());
        //$table->addLabelSite('View', $contentType->getViewSite());


        $page->render();


    }


}