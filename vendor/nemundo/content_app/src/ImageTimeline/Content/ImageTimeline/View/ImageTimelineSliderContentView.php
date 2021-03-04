<?php

namespace Nemundo\Content\App\ImageTimeline\Content\ImageTimeline\View;

use Nemundo\Com\Html\Hyperlink\UrlHyperlink;
use Nemundo\Content\App\ImageTimeline\Content\ImageTimeline\ImageTimelineContentType;
use Nemundo\Content\App\ImageTimeline\Data\Image\ImageReader;
use Nemundo\Content\View\AbstractContentView;
use Nemundo\Html\Formatting\Small;
use Nemundo\Package\Bootstrap\Carousel\BootstrapImageCarousel;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;

class ImageTimelineSliderContentView extends AbstractImageTimelineContentView
{

    public $viewName='Image Slider';

    public function getContent()
    {


        $timelineRow = $this->contentType->getDataRow();

        $carousel=new BootstrapImageCarousel($this);
        $carousel->slideEffect=false;

        $reader=new ImageReader();
        $reader->filter->andEqual($reader->model->timelineId,$this->contentType->getDataId());
        $reader->addOrder($reader->model->id);
        $reader->limit = 10;
        foreach ($reader->getData() as $imageRow) {
            $carousel->addImage($imageRow->image->getImageUrl($imageRow->model->imageAutoSize800));
        }



        /*
        if ($timelineRow->sourceUrl !== '') {

            $row = new BootstrapRow($this);

            $small = new Small($row);
            $small->content = 'Quelle: ' . $timelineRow->sourceUrl;

            $hyperlink = new UrlHyperlink($small);
            $hyperlink->content = $timelineRow->source;
            $hyperlink->url = $timelineRow->sourceUrl;


        }*/


        return parent::getContent();
    }
}