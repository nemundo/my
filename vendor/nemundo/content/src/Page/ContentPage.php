<?php


namespace Nemundo\Content\Page;


use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\App\Application\Com\ApplicationListBox;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\Com\ListBox\ContentTypeListBox;
use Nemundo\Content\Com\ListBox\ViewContentTypeListBox;
use Nemundo\Content\Com\Widget\ContentWidget;
use Nemundo\Content\Index\Tree\Com\Container\TreeIndexContainer;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Content\Site\ContentSite;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;


class ContentPage extends AbstractTemplateDocument
{

    public function getContent()
    {


        $form = new SearchForm($this);

        $formRow = new BootstrapRow($form);

        $applicationListBox = new ApplicationListBox($formRow);
        $applicationListBox->searchMode = true;
        $applicationListBox->submitOnChange = true;
        $applicationListBox->column = true;
        $applicationListBox->columnSize = 2;

        $contentTypeListBox = new ViewContentTypeListBox($formRow);  // new ContentTypeListBox($formRow);
        $contentTypeListBox->searchMode = true;
        $contentTypeListBox->submitOnChange = true;
        $contentTypeListBox->column = true;
        $contentTypeListBox->columnSize = 2;

        if ($applicationListBox->hasValue()) {
            $contentTypeListBox->applicationId=$applicationListBox->getValue();
        }

        $contentTypeParameter = new ContentTypeParameter();
        if ($contentTypeParameter->hasValue()) {

            $contentType = $contentTypeParameter->getContentType();

            $layout = new BootstrapTwoColumnLayout($this);


            if ($contentType->hasList()) {

                $contentTypeListBox = $contentType->getListing($layout->col1);

                $contentTypeListBox->redirectSite = ContentSite::$site;  // ExplorerSite::$site;  // ListingSite::$site;  // ExplorerSite::$site;
                $contentTypeListBox->redirectSite->addParameter(new ContentTypeParameter());

            }


            $contentParameter = new ContentParameter();
            if ($contentParameter->hasValue()) {

                $content = $contentParameter->getContent(false);
                if ($content->hasView()) {
                    //$content->getDefaultView($layout->col2);

                    $widget = new ContentWidget($layout->col2);
                    $widget->contentType = $content;
                    $widget->loadAction = true;
                    $widget->redirectSite = ContentSite::$site;

                    $container = new TreeIndexContainer($layout->col2);
                    $container->contentType = $content;
                    $container->redirectSite = ContentSite::$site;


                }

            } else {

                if ($contentType->hasForm()) {

                    $widget = new AdminWidget($layout->col2);
                    $widget->widgetTitle = 'New';

                    $form = $contentType->getDefaultForm($widget);
                    $form->redirectSite = clone(ContentSite::$site);
                    $form->redirectSite->addParameter(new ContentTypeParameter());
                    //$list->redirectSite = ExplorerSite::$site;
                }


            }


        }


        /*
        $form = new SearchForm($this);

        $formRow = new BootstrapRow($form);

        $contentTypeListBox = new ContentTypeListBox($formRow);
        $contentTypeListBox->submitOnChange = true;
        $contentTypeListBox->searchMode = true;

        //$btn = new AdminSiteButton($this);
        //$btn->site = ContentNewSite::$site;


        $layout = new BootstrapTwoColumnLayout($this);


        $contentReader = new ContentPaginationReader();
        $contentReader->model->loadContentType();
        //$contentReader->model->contentType->loadApplication();
        //$contentReader->model->loadUser();

        $filter = new Filter();
        $model = new ContentModel();

        $contentTypeParameter = new ContentTypeParameter();
        $contentTypeParameter->contentTypeCheck = false;
        if ($contentTypeParameter->hasValue()) {
            $filter->andEqual($model->contentTypeId, $contentTypeParameter->getValue());
        }


        $count = new ContentCount();
        $count->model->loadContentType();
        $count->filter = $filter;
        $contentCount = $count->getCount();

        $p = new Paragraph($layout->col1);
        $p->content = (new Number($contentCount))->formatNumber() . ' Content found';

        $contentReader->filter = $filter;
        $contentReader->addOrder($contentReader->model->id, SortOrder::DESCENDING);
        $contentReader->paginationLimit = 50;

        $table = new AdminClickableTable($layout->col1);

        $header = new TableHeader($table);
        $header->addText('Type');
        $header->addText('Subject');
        $header->addEmpty();
        $header->addEmpty();

        foreach ($contentReader->getData() as $contentRow) {

            //$contentType = $contentRow->getContentType();

            $row = new BootstrapClickableTableRow($table);
            $row->addText($contentRow->contentType->contentType);
            $row->addText($contentRow->subject);

            //  $row->addText($contentType->getSubject());
            //$row->addText($contentRow->dateTime->getShortDateTimeWithSecondLeadingZeroFormat());
            //$row->addText($contentRow->user->login);


            /*
            $site = clone(ContentJsonSite::$site);
            $site->addParameter(new ContentParameter($contentRow->id));
            $row->addSite($site);*/

        /* $site = clone(ContentDeleteSite::$site);
         $site->addParameter(new ContentParameter($contentRow->id));
         $row->addIconSite($site);*/

        /*
                    $site = clone(ContentViewSite::$site);
                    $site->addParameter(new ContentParameter($contentRow->id));
                    $row->addClickableSite($site);

                }

                $pagination = new BootstrapPagination($layout->col1);
                $pagination->paginationReader = $contentReader;


                if ($contentTypeListBox->hasValue()) {

                    $contentType = (new ContentTypeParameter())->getContentType();

                    if ($contentType->hasForm()) {

                        $widget = new AdminWidget($layout->col2);
                        $widget->widgetTitle = 'New';

                        $form = $contentType->getDefaultForm($widget);
                        $form->redirectSite = clone(ContentSite::$site);  // clone(ListingSite::$site);
                        $form->redirectSite->addParameter(new ContentTypeParameter());
                        //$list->redirectSite = ExplorerSite::$site;
                    }

                }*/


        return parent::getContent();

    }

}