<?php

namespace Nemundo\Content\App\Explorer\Page;

use Nemundo\Admin\Com\Button\AdminSearchButton;
use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\App\Application\Com\ApplicationListBox;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Content\Admin\Site\ContentDeleteSite;
use Nemundo\Content\App\Explorer\Collection\BaseContentTypeCollection;
use Nemundo\Content\App\Explorer\Site\ContentSite;
use Nemundo\Content\App\Explorer\Site\ExplorerSite;
use Nemundo\Content\App\Explorer\Site\ListingSite;
use Nemundo\Content\App\Explorer\Template\ExplorerTemplate;
use Nemundo\Content\Com\Input\ContentHiddenInput;
use Nemundo\Content\Com\ListBox\ContentTypeCollectionListBox;
use Nemundo\Content\Data\Content\ContentCount;
use Nemundo\Content\Data\Content\ContentModel;
use Nemundo\Content\Data\Content\ContentPaginationReader;
use Nemundo\Content\Index\Geo\Com\Container\GeoIndexContainer;
use Nemundo\Content\Index\Relation\Com\Widget\RelationIndexWidget;
use Nemundo\Content\Index\Search\Com\Container\SearchIndexContainer;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Content\Parameter\ContentViewParameter;
use Nemundo\Core\Type\Number\Number;
use Nemundo\Db\Filter\Filter;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;
use Nemundo\Package\Bootstrap\Pagination\BootstrapPagination;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;

class ContentPage extends ExplorerTemplate
{
    public function getContent()
    {

        $form = new SearchForm($this);

        $formRow = new BootstrapRow($form);

        /*$listbox = new ContentTypeListBox($formRow);
        $listbox->submitOnChange = true;
        $listbox->searchMode = true;*/

        $list = new ContentTypeCollectionListBox($formRow);
        $list->contentTypeCollection = new BaseContentTypeCollection();
        $list->searchMode = true;
        $list->submitOnChange = true;

        $application = new ApplicationListBox($formRow);
        $application->submitOnChange = true;
        $application->searchMode = true;

        $subject = new BootstrapTextBox($formRow);
        $subject->label = 'Subject';
        $subject->searchMode = true;

        new AdminSearchButton($formRow);

        $layout = new BootstrapTwoColumnLayout($this);

        $contentReader = new ContentPaginationReader();
        $contentReader->model->loadContentType();
        $contentReader->model->contentType->loadApplication();
        //$contentReader->model->loadUser();

        $filter = new Filter();
        $model = new ContentModel();

        if ($application->hasValue()) {
            $filter->andEqual($contentReader->model->contentType->applicationId, $application->getValue());
        }

        $contentTypeParameter = new ContentTypeParameter();
        $contentTypeParameter->contentTypeCheck = false;
        if ($contentTypeParameter->hasValue()) {
            $filter->andEqual($model->contentTypeId, $contentTypeParameter->getValue());

            $contentType=$contentTypeParameter->getContentType();
            if ($contentType->hasForm()) {

                $widget=new AdminWidget($layout->col2);
                $widget->widgetTitle='New';

                $form = $contentType->getDefaultForm($widget);
                $form->redirectSite = clone(ContentSite::$site);  // clone(ListingSite::$site);
                $form->redirectSite->addParameter(new ContentTypeParameter());
                //$list->redirectSite = ExplorerSite::$site;
            }

        }





        //if ($user->hasValue()) {
        //$filter->andEqual($model->userId, $user->getValue());
        //}


        $count = new ContentCount();
        $count->model->loadContentType();
        $count->filter = $filter;
        $contentCount = $count->getCount();

        $p = new Paragraph($layout->col1);
        $p->content = (new Number($contentCount))->formatNumber() . ' Content found';

        $contentReader->filter = $filter;
//        $contentReader->addOrder($contentReader->model->id, SortOrder::DESCENDING);
        $contentReader->addOrder($contentReader->model->subject);

        $contentReader->paginationLimit = 50;

        $table = new AdminClickableTable($layout->col1);

        $header = new TableHeader($table);
        $header->addText('Subject');
        $header->addText('Type');
        $header->addEmpty();

        foreach ($contentReader->getData() as $contentRow) {

            $row = new BootstrapClickableTableRow($table);

            $row->addText($contentRow->subject);
            $row->addText($contentRow->contentType->contentType);

            $site = clone(ContentDeleteSite::$site);
            $site->addParameter(new ContentParameter($contentRow->id));
            $row->addIconSite($site);

            $site = clone(ContentSite::$site);  // clone(ItemSite::$site);
            $site->addParameter(new ContentTypeParameter());
            $site->addParameter(new ContentParameter($contentRow->id));
            $row->addClickableSite($site);

            $site = clone(ExplorerSite::$site);
            $site->addParameter(new ContentParameter($contentRow->id));
            $row->addClickableSite($site);

        }

        $pagination = new BootstrapPagination($this);
        $pagination->paginationReader = $contentReader;

        $contentParameter = new ContentParameter();
        if ($contentParameter->hasValue()) {

            $contentType = $contentParameter->getContentType(false);

            $form = new SearchForm($layout->col2);

            new ContentHiddenInput($form);

            $formRow = new BootstrapRow($form);

            $listbox = new BootstrapListBox($formRow);
            $listbox->label = 'View';
            $listbox->name = (new ContentViewParameter())->getParameterName();
            $listbox->submitOnChange = true;

            foreach ($contentType->getViewList() as $view) {
                $listbox->addItem($view->getClassName(), $view->viewName);
            }

            /*
            $btn=new AdminSiteButton($layout->col2);
            $btn->site = clone(ItemSite::$site);
            $btn->site->addParameter(new ContentParameter());*/

            $widget = new AdminWidget($layout->col2);
            $widget->widgetTitle = $contentType->getSubject();

            $contentType->getDefaultView($widget);

            $widget = new RelationIndexWidget($layout->col2);
            $widget->contentType = $contentType;
            $widget->redirectSite = ContentSite::$site;

            $widget = new AdminWidget($layout->col2);
            $widget->widgetTitle = 'Search Index';

            $container = new SearchIndexContainer($widget);
            $container->contentType = $contentType;

            $container = new GeoIndexContainer($layout->col2);
            $container->contentType = $contentType;
            $container->redirectSite = ContentSite::$site;

        }

        return parent::getContent();

    }

}