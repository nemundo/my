<?php


namespace Nemundo\Content\App\Calendar\Page;


use Nemundo\Admin\Com\Button\AdminIconSiteButton;
use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\App\Calendar\Content\Calendar\CalendarContentType;
use Nemundo\Content\App\Calendar\Data\Calendar\CalendarPaginationReader;

use Nemundo\Content\App\Calendar\Data\CalendarSourceType\CalendarSourceTypeReader;
use Nemundo\Content\App\Calendar\Parameter\CalendarParameter;
use Nemundo\Content\App\Calendar\Site\CalendarSite;
use Nemundo\Content\App\Calendar\Site\VCalendarIconSite;
use Nemundo\Content\App\Calendar\Template\CalendarTemplate;
use Nemundo\Content\App\Calendar\Type\CalendarIndexTrait;
use Nemundo\Content\App\Explorer\Collection\BaseContentTypeCollection;
use Nemundo\Content\App\Explorer\Site\ItemSite;

use Nemundo\Content\App\Explorer\Site\NewSite;

use Nemundo\Content\Com\Dropdown\ContentTypeCollectionSubmenuDropdown;
use Nemundo\Content\Index\Group\User\GroupMembership;
use Nemundo\Content\Index\Tree\Com\Container\ContentChildContainer;
use Nemundo\Content\Index\Tree\Com\Table\ParentTreeTable;
use Nemundo\Content\Index\Tree\Type\AbstractTreeContentType;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Core\Type\DateTime\Date;
use Nemundo\Db\Filter\Filter;
use Nemundo\Html\Block\Div;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Package\Bootstrap\Pagination\BootstrapPagination;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;

class CalendarPage extends CalendarTemplate
{

    public function getContent()
    {


        /*
        $formSearch = new SearchForm($page);

        $formRow = new BootstrapRow($formSearch);

        $sourceType = new BootstrapListBox($formRow);
        $sourceType->label = 'Quelle';
        $sourceType->submitOnChange = true;
        $sourceType->searchMode = true;

        $reader = new CalendarSourceTypeReader();
        $reader->model->loadContentType();
        foreach ($reader->getData() as $sourceTypeRow) {
            $sourceType->addItem($sourceTypeRow->contentTypeId, $sourceTypeRow->contentType->contentType);
        }*/

        $layout=new BootstrapTwoColumnLayout($this);


        $calendarReader = new CalendarPaginationReader();
        $calendarReader->addOrder($calendarReader->model->date);
        //$reader->paginationLimit = ProcessConfig::PAGINATION_LIMIT;

        $table = new AdminClickableTable($layout->col1);

        $header = new TableHeader($table);
        $header->addText($calendarReader->model->date->label);
        $header->addText($calendarReader->model->time->label);
        $header->addText($calendarReader->model->event->label);

        foreach ($calendarReader->getData() as $calendarRow) {

            $row = new BootstrapClickableTableRow($table);
            $row->addText($calendarRow->date->getShortDateLeadingZeroFormat());
            $row->addText($calendarRow->time->getTimeLeadingZero());
            $row->addText($calendarRow->event);

            $site=clone(CalendarSite::$site);
            $site->addParameter(new CalendarParameter($calendarRow->id));
            $row->addClickableSite($site);

        }

        $pagination = new BootstrapPagination($layout->col1);
        $pagination->paginationReader = $calendarReader;



        $parameter=new CalendarParameter();
        if ($parameter->hasValue()) {


            $contentType = new CalendarContentType($parameter->getValue());
            $contentType->getDefaultView($layout->col2);


            $dropdown = new ContentTypeCollectionSubmenuDropdown($layout->col2);
            $dropdown->redirectSite = clone(NewSite::$site);
            $dropdown->redirectSite->addParameter(new ContentParameter());
            foreach ((new BaseContentTypeCollection())->getContentTypeList() as $child) {
                $dropdown->addContentType($child);
            }


            $container = new ContentChildContainer($layout->col2);
            $container->contentType=$contentType;

        }

        return parent::getContent();

    }


}