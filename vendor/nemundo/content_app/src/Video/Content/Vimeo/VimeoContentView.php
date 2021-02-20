<?php


namespace Nemundo\Content\App\Video\Content\Vimeo;


use Nemundo\Com\Video\Vimeo\VimeoPlayer;
use Nemundo\Content\View\AbstractContentView;

class VimeoContentView extends AbstractContentView
{

    /**
     * @var VimeoContentType
     */
    public $contentType;

    public function getContent()
    {

        $player = new VimeoPlayer($this);
        $player->videoId = $this->contentType->getDataRow()->vimeoId;
        return parent::getContent();

    }

}