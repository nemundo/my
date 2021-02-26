<?php

namespace Nemundo\Content\App\ImageTimeline\Content\ImageTimeline\View;

use Nemundo\Com\Html\Hyperlink\UrlHyperlink;
use Nemundo\Content\App\ImageTimeline\Content\ImageTimeline\ImageTimelineContentType;
use Nemundo\Content\App\ImageTimeline\Data\Image\ImageReader;
use Nemundo\Content\View\AbstractContentView;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Html\Formatting\Small;
use Nemundo\Package\Bootstrap\Image\BootstrapResponsiveImage;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;

class ImageTimelineLatestContentView extends AbstractImageTimelineContentView
{
    /**
     * @var ImageTimelineContentType
     */
    public $contentType;

    public $viewName='Latest Image';

    public function getContent()
    {

        $reader=new ImageReader();
        $reader->filter->andEqual($reader->model->timelineId,$this->contentType->getDataId());
        $reader->addOrder($reader->model->id,SortOrder::DESCENDING);
        $reader->limit = 1;
        foreach ($reader->getData() as $imageRow) {

            $img = new BootstrapResponsiveImage($this);
            $img->src=$imageRow->image->getImageUrl($imageRow->model->imageAutoSize800);

        }






        return parent::getContent();
    }
}