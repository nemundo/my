<?php

namespace Nemundo\Content\App\ImageTimeline\Page;

use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\App\ImageTimeline\Com\ListBox\ImageTimelineListBox;
use Nemundo\Content\App\ImageTimeline\Data\Image\ImageReader;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Package\Bootstrap\Carousel\BootstrapImageCarousel;
use Nemundo\Package\Bootstrap\FormElement\BootstrapFromToDatePicker;
use Nemundo\Package\Bootstrap\Image\BootstrapResponsiveImage;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;

class ImageTimelinePage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $form = new SearchForm($this);

        $row = new BootstrapRow($form);

        $timeline = new ImageTimelineListBox($row);
        $timeline->submitOnChange = true;
        $timeline->searchMode = true;
        $timeline->column = true;
        $timeline->columnSize = 2;

        $dateFromTo=new BootstrapFromToDatePicker($row);
        $dateFromTo->column = true;
        $dateFromTo->columnSize = 2;


        if ($timeline->hasValue()) {


            $carousel = new BootstrapImageCarousel($this);
            $carousel->slideEffect = false;
            $carousel->slideshow=true;
            $carousel->slideshowInterval = 1000;

            //$table = new AdminTable($this);

            $reader = new ImageReader();
            $reader->filter->andEqual($reader->model->timelineId, $timeline->getValue());
            $reader->addOrder($reader->model->id, SortOrder::DESCENDING);
            $reader->limit = 20;
            $reader->reverse = true;
            foreach ($reader->getData() as $imageRow) {
                $carousel->addImage($imageRow->image->getImageUrl($imageRow->model->imageAutoSize800));

                //$row = new TableRow($table);
                //$row->addText($imageRow->dateTime->getIsoDateTimeFormat());

                //$img = new BootstrapResponsiveImage($row);
                //$img->src = $imageRow->image->getImageUrl($imageRow->model->imageAutoSize800);

            }


        }

        return parent::getContent();

    }

}