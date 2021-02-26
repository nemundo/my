<?php

namespace Nemundo\Content\App\Stream\Page;


use Nemundo\Admin\Com\Card\AdminCard;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\Action\EditContentAction;
use Nemundo\Content\App\Stream\Action\StreamDeleteContentAction;
use Nemundo\Content\App\Stream\Collection\StreamContentTypeCollection;
use Nemundo\Content\App\Stream\Data\Stream\StreamPaginationReader;
use Nemundo\Content\App\Stream\Event\StreamEvent;
use Nemundo\Content\Com\Container\ContentTypeFormContainer;
use Nemundo\Content\Com\ListBox\ContentTypeCollectionListBox;
use Nemundo\Content\Com\ListBox\ContentTypeListBox;
use Nemundo\Content\Com\Widget\ContentWidget;
use Nemundo\Content\Index\Tree\Action\ViewChange\ViewChangeContentAction;
use Nemundo\Content\Index\Tree\Com\Form\RestrictedContentTypeForm;
use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Package\Bootstrap\Pagination\BootstrapPagination;
use Nemundo\Package\Bootstrap\Utility\BootstrapSpacing;

class StreamPage extends AbstractTemplateDocument
{

    public function getContent()
    {


        $layout = new BootstrapTwoColumnLayout($this);


        $form = new SearchForm($layout->col2);

        $listbox =new ContentTypeCollectionListBox($form);
        $listbox->contentTypeCollection=new StreamContentTypeCollection();
        $listbox->submitOnChange = true;
        $listbox->searchMode = true;


        $contentTypeParameter = new ContentTypeParameter();
        if ($contentTypeParameter->hasValue()) {

            $form = new ContentTypeFormContainer($layout->col2);
            $form->contentType = $contentTypeParameter->getContentType();
            $form->contentType->addEvent(new StreamEvent());

        }


        $streamReader = new StreamPaginationReader();
        $streamReader->model->loadContent();
        $streamReader->model->content->loadContentType();
        $streamReader->addOrder($streamReader->model->id, SortOrder::DESCENDING);


        foreach ($streamReader->getData() as $streamRow) {

            $contentType = $streamRow->content->getContentType();

            $widget = new ContentWidget($layout->col1);
            $widget->contentType = $contentType;
            $widget->addContentAction(new EditContentAction());
            $widget->addContentAction(new StreamDeleteContentAction());
            $widget->addContentAction(new ViewChangeContentAction());


            $widget->widgetTitle = $contentType->getSubject() . ' - ' . $streamRow->dateTime->getShortDateTimeLeadingZeroFormat();


            $widget->addCssClass(BootstrapSpacing::MARIGN_BOTTOM_3);


            $p=new Paragraph($layout->col1);
            $p->content = $streamRow->contentViewId;


            /*$card = new AdminCard($layout->col1);
            $card->title =
            $contentType->getSubject() . ' ' . $streamRow->dateTime->getShortDateTimeLeadingZeroFormat();

            $contentType->getDefaultView($card);*/

        }


        $pagination = new BootstrapPagination($layout->col1);
        $pagination->paginationReader = $streamReader;


        return parent::getContent();

    }

}