<?php

namespace Nemundo\Content\App\Explorer\Page;

use Nemundo\Admin\Com\Button\AdminCopyButton;
use Nemundo\Admin\Com\Button\AdminIconSiteButton;
use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Com\Html\Listing\UnorderedList;
use Nemundo\Content\App\Calendar\Com\Container\CalendarContainer;
use Nemundo\Content\App\ContentPrint\Site\ContentPrintSite;
use Nemundo\Content\App\Explorer\Collection\BaseContentTypeCollection;
use Nemundo\Content\App\Explorer\Com\Dropdown\MenuDropdown;

use Nemundo\Content\App\Explorer\Parameter\PublicShareParameter;
use Nemundo\Content\App\Explorer\Site\ChildOrderSite;
use Nemundo\Content\App\Explorer\Site\ContentEditSite;
use Nemundo\Content\App\Explorer\Site\ExplorerSite;
use Nemundo\Content\App\Explorer\Site\NewSite;
use Nemundo\Content\App\Explorer\Site\Share\PublicShareDeleteSite;

use Nemundo\Content\App\Explorer\Template\ExplorerTemplate;
use Nemundo\Content\App\Favorite\Action\FavoriteSaveContentAction;
use Nemundo\Content\App\Inbox\Action\SendToContentAction;
use Nemundo\Content\App\PublicShare\Action\PublicShareAction;
use Nemundo\Content\App\PublicShare\Action\PublicShareView;
use Nemundo\Content\Com\Container\ContentPropertyContainer;
use Nemundo\Content\Com\Dropdown\ContentActionDropdown;
use Nemundo\Content\Com\Dropdown\ContentTypeCollectionSubmenuDropdown;
use Nemundo\Content\Com\Input\ContentHiddenInput;
use Nemundo\Content\Com\ListBox\ContentViewListBox;
use Nemundo\Content\Com\Widget\ContentWidget;
use Nemundo\Content\Index\Geo\Com\Container\GeoIndexContainer;
use Nemundo\Content\Index\Geo\Site\Kml\GeoIndexKmlSite;
use Nemundo\Content\Index\Geo\Type\GeoIndexTrait;
use Nemundo\Content\Index\Group\Com\Container\GroupContainer;
use Nemundo\Content\Index\Log\Com\Container\LogContainer;
use Nemundo\Content\Index\Relation\Com\Widget\RelationIndexWidget;
use Nemundo\Content\Index\Tree\Com\Breadcrumb\TreeBreadcrumb;
use Nemundo\Content\Index\Tree\Com\Container\TreeIndexContainer;
use Nemundo\Content\Index\Tree\Com\Dropdown\RestrictedContentTypeDropdown;
use Nemundo\Content\Index\Tree\Com\Form\ContentViewChangeForm;
use Nemundo\Content\Index\Tree\Com\Table\ChildTreeTable;
use Nemundo\Content\Index\Tree\Data\Tree\TreeReader;
use Nemundo\Content\Index\Tree\Parameter\TreeParameter;
use Nemundo\Content\Index\Tree\Site\ContentRemoveSite;
use Nemundo\Content\Index\Tree\Site\TreeConfigSite;
use Nemundo\Content\Index\Tree\Site\ViewEditSite;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Content\Parameter\ContentViewParameter;
use Nemundo\Db\Sql\Field\CountField;
use Nemundo\Html\Header\Title;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;
use Nemundo\Package\Bootstrap\Layout\BootstrapThreeColumnLayout;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;


class ExplorerPage extends ExplorerTemplate
{

    public function getContent()
    {

        $contentType = (new ContentParameter())->getContent(false);

        $title = new Title($this);
        $title->content = $contentType->getSubject();

        $breadcrumb = new TreeBreadcrumb($this);
        $breadcrumb->redirectSite = ExplorerSite::$site;
        $breadcrumb->addActiveParentContentType($contentType);


        $layout = new BootstrapTwoColumnLayout($this);
        $layout->col1->columnWidth = 8;
        $layout->col2->columnWidth = 4;


        if ($contentType->hasView()) {

            $widget = new ContentWidget($layout->col1);
            $widget->contentType = $contentType;
            $widget->viewId=(new ContentViewParameter())->getValue();
            $widget->redirectSite=ExplorerSite::$site;
            $widget->loadAction=false;
            //$widget->showMenu=false;



            $site = clone(ContentEditSite::$site);
            $site->addParameter(new ContentParameter());
            $widget->actionDropdown->addSite($site);


            $site = clone(ChildOrderSite::$site);
            $site->addParameter(new ContentParameter());
            $widget->actionDropdown->addSite($site);



            $site = clone(ContentPrintSite::$site);
            $site->addParameter(new ContentParameter());
            $widget->actionDropdown->addSite($site);


            if ($contentType->isObjectOfTrait(GeoIndexTrait::class)) {
            $site = clone(GeoIndexKmlSite::$site);
            $site->addParameter(new ContentParameter());
            $widget->actionDropdown->addSite($site);
            }




            /*
            $site = clone(ContentRemoveSite::$site);
            $site->addParameter(new TreeParameter());
            $widget->actionDropdown->addSite($site);
*/


            $widget->actionDropdown->addSeperator();

            $site = clone(TreeConfigSite::$site);
            $site->addParameter(new ContentTypeParameter($contentType->typeId));
            $widget->actionDropdown->addSite($site);



            /*
            $site = clone(PublicShareSiContentPrintSite::$site);
            $site->addParameter(new ContentParameter());
            $widget->actionDropdown->addSite($site);
*/



            /*
            $site = clone(ViewEditSite::$site);
            $site->addParameter(new TreeParameter($tre));
            $widget->actionDropdown->addSite($site);
*/




            /*
            $div = new BootstrapThreeColumnLayout($widget);
            $div->col1->columnWidth = 1;
            $div->col2->columnWidth = 1;
            $div->col3->columnWidth = 2;
*/

            /*
            $dropdown=new RestrictedContentTypeDropdown($div->col1);
            $dropdown->redirectSite = clone(NewSite::$site);
            $dropdown->redirectSite->addParameter(new ContentParameter());
            $dropdown->contentTypeId = $contentType->typeId;*/

        }


        $container = new ChildTreeTable($layout->col2);  // new TreeIndexContainer($layout->col2);
        $container->contentType = $contentType;
        $container->redirectSite = ExplorerSite::$site;

        $container= new PublicShareView($layout->col2);
        $container->contentType = $contentType;

        //$container->actionContentId=  $contentType->getContentId();







        return parent::getContent();

    }

}