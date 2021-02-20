<?php

namespace Nemundo\Content\App\Explorer\Page;

use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Content\App\Dashboard\Data\Dashboard\DashboardRow;
use Nemundo\Content\App\Explorer\Collection\BaseContentTypeCollection;
use Nemundo\Content\App\Explorer\Site\ExplorerSite;
use Nemundo\Content\App\Explorer\Site\ListingSite;
use Nemundo\Content\App\Explorer\Template\ExplorerTemplate;
use Nemundo\Content\Com\ListBox\ContentTypeCollectionListBox;
use Nemundo\Content\Com\ListBox\ContentTypeListBox;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapColumn;

use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;

// ContentListPage
class ListingPage extends ExplorerTemplate
{
    public function getContent()
    {

        $form = new SearchForm($this);

        $formRow = new BootstrapColumn($form);  // new BootstrapRow() new DashboardRow() new BootstrapRow($form);


        //new BootstrapTwoColumnLayout()

        $formRow->columnWidth= 2;



        $list = new ContentTypeListBox($formRow);

        //$list = new ContentTypeCollectionListBox($formRow);
        //$list->contentTypeCollection=new BaseContentTypeCollection();
        $list->searchMode = true;
        $list->submitOnChange = true;

        $contentTypeParameter = new ContentTypeParameter();
        if ($contentTypeParameter->hasValue()) {

            $contentType = $contentTypeParameter->getContentType();

            $layout = new BootstrapTwoColumnLayout($this);


            if ($contentType->hasList()) {

                $list = $contentType->getListing($layout->col1);
                $list->redirectSite = ExplorerSite::$site;  // ListingSite::$site;  // ExplorerSite::$site;
                //$list->redirectSite->addParameter(new ContentTypeParameter());

            }

            if ($contentType->hasForm()) {

                $widget=new AdminWidget($layout->col2);
                $widget->widgetTitle='New';

                $form = $contentType->getDefaultForm($widget);
                $form->redirectSite = clone(ListingSite::$site);
                $form->redirectSite->addParameter(new ContentTypeParameter());
                //$list->redirectSite = ExplorerSite::$site;
            }


            $contentParameter = new ContentParameter();
            if ($contentParameter->hasValue()) {

                $content = $contentParameter->getContentType(false);
                if ($content->hasView()) {
                    $content->getDefaultView($layout->col2);
                }

            }


        }

        return parent::getContent();

    }

}