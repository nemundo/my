<?php

namespace Nemundo\Content\App\File\Content\Audio;

use Nemundo\Content\View\AbstractContentView;
use Nemundo\Html\Player\AudioPlayer;

class AudioContentView extends AbstractContentView
{
    /**
     * @var AudioContentType
     */
    public $contentType;

    public function getContent()
    {

        $fileRow = $this->contentType->getDataRow();

        $audio = new AudioPlayer($this);
        $audio->src = $fileRow->audio->getUrl();

        return parent::getContent();

    }
}