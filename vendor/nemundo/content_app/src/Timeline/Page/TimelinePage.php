<?php

namespace Nemundo\Content\App\Timeline\Page;

use Nemundo\Admin\Com\Button\AdminSearchButton;
use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\App\Timeline\Data\Timeline\TimelinePaginationReader;
use Nemundo\Content\App\Timeline\Data\Timeline\TimelineReader;
use Nemundo\Content\App\Timeline\Site\ItemSite;
use Nemundo\Content\App\TimeSeries\Com\ListBox\LineListBox;
use Nemundo\Content\App\TimeSeries\Com\ListBox\TimeSeriesListBox;
use Nemundo\Content\App\TimeSeries\Parameter\PeriodTypeParameter;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Html\Form\Input\HiddenInput;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;
use Nemundo\Package\Bootstrap\FormElement\BootstrapFromToDatePicker;
use Nemundo\Package\Bootstrap\Pagination\BootstrapPagination;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;

class TimelinePage extends AbstractTemplateDocument
{
    public function getContent()
    {


        $form = new SearchForm($this);

        $formRow = new BootstrapRow($form);

        $dateFromTo = new BootstrapFromToDatePicker($formRow);
        $dateFromTo->searchMode = true;

        new AdminSearchButton($formRow);



        // ajax loading
        // search from to

        $table=new AdminClickableTable($this);


        $reader=new TimelinePaginationReader();
        $reader->model->loadContent();
        $reader->model->content->loadContentType();

        if ($dateFromTo->hasValueFrom()) {
            $reader->filter->andEqualOrGreater($reader->model->date,$dateFromTo->getDateFrom()->getIsoDateFormat());
        }

        if ($dateFromTo->hasValueTo()) {
            $reader->filter->andEqualOrSmaller($reader->model->date,$dateFromTo->getDateTo()->getIsoDateFormat());
        }

        $reader->addOrder($reader->model->dateTime,SortOrder::DESCENDING);

        $header = new AdminTableHeader($table);
        $header->addText($reader->model->dateTime->label);
        $header->addText($reader->model->subject->label);
        $header->addText($reader->model->content->contentType->label);

        foreach ($reader->getData() as $timelineRow) {

            $row = new BootstrapClickableTableRow($table);
            $row->addText($timelineRow->dateTime->getShortDateTimeLeadingZeroFormat());
            $row->addText($timelineRow->subject);
            $row->addText($timelineRow->content->contentType->contentType);


            //$contentType = $timelineRow->content->getContentType();
            //$row->addText($contentType->getSubject());
            //$contentType->getDefaultView($row);

            $site=clone(ItemSite::$site);
            $site->addParameter(new ContentParameter($timelineRow->contentId));
            $row->addClickableSite($site);

        }


        $pagination=new BootstrapPagination($this);
        $pagination->paginationReader=$reader;



        return parent::getContent();
    }
}