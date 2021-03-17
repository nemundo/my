<?php


namespace Nemundo\Content\App\Dashboard\Page\Admin;


use Nemundo\Admin\Com\Button\AdminIconSiteButton;
use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\App\Dashboard\Content\Dashboard\DashboardContentType;
use Nemundo\Content\App\Dashboard\Data\Dashboard\DashboardReader;
use Nemundo\Content\App\Dashboard\Parameter\DashboardParameter;
use Nemundo\Content\App\Dashboard\Site\Edit\ContentEditSite;
use Nemundo\Content\App\Dashboard\Site\Edit\ContentNewSite;
use Nemundo\Content\App\Dashboard\Site\Admin\DashboardEditSite;
use Nemundo\Content\App\Dashboard\Template\DashboardAdminTemplate;
use Nemundo\Content\Com\Input\ContentHiddenInput;
use Nemundo\Content\Com\ListBox\ContentViewListBox;
use Nemundo\Content\Com\Widget\ContentWidget;
use Nemundo\Content\Index\Tree\Com\Breadcrumb\TreeBreadcrumb;
use Nemundo\Content\Index\Tree\Com\Container\TreeIndexContainer;
use Nemundo\Content\Index\Tree\Com\Dropdown\RestrictedContentTypeDropdown;
use Nemundo\Content\Index\Tree\Com\Table\ChildTreeTable;
use Nemundo\Content\Index\Tree\Parameter\TreeParameter;
use Nemundo\Content\Index\Tree\Site\Sortable\ContentSortableSite;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Core\Debug\Debug;
use Nemundo\Html\Header\Title;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Package\Bootstrap\Card\BootstrapCard;
use Nemundo\Package\Bootstrap\Layout\BootstrapThreeColumnLayout;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Paranautik\Xcontest\Site\XcontestDesktopSite;


class DashboardAdminPage extends DashboardAdminTemplate // AbstractTemplateDocument
{

    public function getContent()
    {


        $reader = new DashboardReader();

        $table=new AdminClickableTable($this);

        $header = new AdminTableHeader($table);
        $header->addText($reader->model->active->label);
        $header->addText($reader->model->dashboard->label);



        foreach ($reader->getData() as $dashboardRow) {

            $row = new BootstrapClickableTableRow($table);
            $row->addYesNo($dashboardRow->active);
            $row->addText($dashboardRow->dashboard);

            $site = clone(DashboardEditSite::$site);
            //$site->addParameter(new DashboardParameter($dashboardRow->id));
            $site->addParameter(new ContentParameter((new DashboardContentType($dashboardRow->id))->getContentId()));
            $row->addClickableSite($site);

        }




        /*
        $content = (new ContentParameter())->getContent(false);

        $title = new Title($this);
        $title->content = $content->getSubject();

        $layout = new BootstrapTwoColumnLayout($this);
        $layout->col1->columnWidth = 8;
        $layout->col2->columnWidth = 4;

        if ($content->hasView()) {

            // $card = new AdminWidget($layout->col1);
            //$widget->widgetTitle = $content->getSubject();


            //(new Debug())->write(DashboardEditSite::$site);

            $breadcrumb = new TreeBreadcrumb($layout->col1);
            $breadcrumb->redirectSite= DashboardEditSite::$site;
            $breadcrumb->addActiveParentContentType($content);




            $card = new ContentWidget($layout->col1);
            $card->contentType = $content;

            $site = clone(ContentSortableSite::$site);
            $site->addParameter(new ContentParameter($content->getContentId()));
            $card->actionDropdown->addSite($site);

            //$card = new BootstrapCard($layout->col1);
            //$card->header = $content->getSubject();


            /*            $cardTitle = new BootstrapCardTitle($card);
                        $cardTitle->content= $content->getSubject();
              */
            //<h5 class="card-title">Card title</h5>


            /*
            $div = new BootstrapThreeColumnLayout($card);
            $div->col1->columnWidth = 1;
            $div->col2->columnWidth = 1;
            $div->col3->columnWidth = 2;

            $dropdown = new RestrictedContentTypeDropdown($div->col1);
            $dropdown->redirectSite = clone(ContentNewSite::$site);  // clone(NewSite::$site);
            $dropdown->redirectSite->addParameter(new ContentParameter());
            $dropdown->contentTypeId = $content->typeId;


            $btn = new AdminIconSiteButton($div->col1);
            $btn->site = clone(ContentEditSite::$site);
            $btn->site->addParameter(new ContentParameter());


            //$dropdown = new MenuDropdown($div->col2);
            //$dropdown->contentType = $content;


            $form = new SearchForm($div->col3);

            $viewListBox = new ContentViewListBox($form);
            $viewListBox->contentType = $content;
            $viewListBox->submitOnChange = true;
            $viewListBox->searchMode = true;

            new ContentHiddenInput($form);


            if ($viewListBox->hasValue()) {


                $p = new Paragraph($div->col3);
                $p->content = 'View: ' . $viewListBox->getValue();

                $content->getView($viewListBox->getValue(), $card);

            } else {

                $content->getDefaultView($card);

            }*/


        //}


        /*
        $container = new TreeIndexContainer($layout->col2);
        $container->contentType = $content;
        $container->redirectSite = DashboardEditSite::$site;*/


        /*
        $table = new ChildTreeTable($layout->col2);
        $table->contentType = $content;
        $table->redirectSite = DashboardEditSite::$site;
*/


        return parent::getContent();

    }

}