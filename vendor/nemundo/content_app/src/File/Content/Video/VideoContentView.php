<?php

namespace Nemundo\Content\App\File\Content\Video;

use Nemundo\Content\View\AbstractContentView;
use Nemundo\Html\Player\VideoPlayer;

class VideoContentView extends AbstractContentView
{
    /**
     * @var VideoContentType
     */
    public $contentType;

    public function getContent()
    {

        /*
        video {
        width: 100%;
        max-height: 100%;
}*/


        $fileRow = $this->contentType->getDataRow();

        $video = new VideoPlayer($this);
   //     $video->addCssClass('embed-responsive-item');
        $video->src = $fileRow->video->getUrl();
        $video->width = 800;

        return parent::getContent();
    }
}