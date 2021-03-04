<?php


namespace Nemundo\Content\App\Dashboard\Page\Edit;


use Nemundo\Admin\Com\Button\AdminIconSiteButton;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\App\Dashboard\Site\Edit\ContentEditSite;
use Nemundo\Content\App\Dashboard\Site\Edit\ContentNewSite;
use Nemundo\Content\App\Dashboard\Site\Edit\DashboardEditSite;
use Nemundo\Content\App\Explorer\Site\ChildOrderSite;
use Nemundo\Content\Com\Input\ContentHiddenInput;
use Nemundo\Content\Com\ListBox\ContentViewListBox;
use Nemundo\Content\Com\Widget\ContentWidget;
use Nemundo\Content\Index\Tree\Com\Container\TreeIndexContainer;
use Nemundo\Content\Index\Tree\Com\Dropdown\RestrictedContentTypeDropdown;
use Nemundo\Content\Index\Tree\Com\Table\ChildTreeTable;
use Nemundo\Content\Index\Tree\Parameter\TreeParameter;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Html\Header\Title;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Package\Bootstrap\Card\BootstrapCard;
use Nemundo\Package\Bootstrap\Layout\BootstrapThreeColumnLayout;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;


class DashboardEditPage extends AbstractTemplateDocument
{

    public function getContent()
    {

        $content = (new ContentParameter())->getContent(false);

        $title = new Title($this);
        $title->content = $content->getSubject();

        $layout = new BootstrapTwoColumnLayout($this);
        $layout->col1->columnWidth = 8;
        $layout->col2->columnWidth = 4;

        if ($content->hasView()) {

            // $card = new AdminWidget($layout->col1);
            //$widget->widgetTitle = $content->getSubject();


            $card = new ContentWidget($layout->col1);
            $card->contentType = $content;

            $site = clone(ChildOrderSite::$site);
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


        }


        /*
        $container = new TreeIndexContainer($layout->col2);
        $container->contentType = $content;
        $container->redirectSite = DashboardEditSite::$site;*/


        $table = new ChildTreeTable($layout->col2);
        $table->contentType = $content;
        $table->redirectSite = DashboardEditSite::$site;



        return parent::getContent();

    }

}