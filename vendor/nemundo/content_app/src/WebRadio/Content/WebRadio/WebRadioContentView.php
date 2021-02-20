<?php

namespace Nemundo\Content\App\WebRadio\Content\WebRadio;

use Nemundo\Content\View\AbstractContentView;
use Nemundo\Html\Player\AudioPlayer;

class WebRadioContentView extends AbstractContentView
{

    /**
     * @var WebRadioContentType
     */
    public $contentType;

    public function getContent()
    {

        $player = new AudioPlayer($this);
        $player->src = $this->contentType->getDataRow()->streamUrl;

        return parent::getContent();

    }
}