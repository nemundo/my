<?php

namespace Nemundo\Content\App\ImageTimeline\Content\ImageTimeline\View;

use Nemundo\Content\App\ImageTimeline\Content\ImageTimeline\ImageTimelineContentType;
use Nemundo\Content\App\ImageTimeline\Data\Image\ImageReader;
use Nemundo\Content\View\AbstractContentView;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Package\Bootstrap\Image\BootstrapResponsiveImage;

class ImageTimelineRemoteContentView extends AbstractImageTimelineContentView
{

    public $viewName='Remote Image';

    public function getContent()
    {

        $img = new BootstrapResponsiveImage($this);
        $img->src= $this->contentType->getDataRow()->imageUrl;


        return parent::getContent();
    }
}