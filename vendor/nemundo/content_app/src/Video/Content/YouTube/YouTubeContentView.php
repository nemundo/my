<?php


namespace Nemundo\Content\App\Video\Content\YouTube;


use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\Com\Video\YouTube\YouTubePlayer;
use Nemundo\Content\View\AbstractContentView;
use Nemundo\Html\Block\Div;
use Nemundo\Html\Container\HtmlContainer;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Package\Bootstrap\Helper\Ratio\BootstrapAspectRatio;
use Nemundo\Package\Bootstrap\Helper\Ratio\BootstrapRatioDiv;


class YouTubeContentView extends AbstractContentView
{

    /**
     * @var YouTubeContentType
     */
    public $contentType;

    public $viewName='Video';


    protected function loadView()
    {

        $this->viewName='default';
        $this->viewId='f4c68029-6d55-4bec-8352-6d11da635fae';
        $this->defaultView=true;

    }


    public function getContent()
    {

        $youtubeRow = $this->contentType->getDataRow();

        $div = new BootstrapRatioDiv($this);
        $div->aspectRatio=BootstrapAspectRatio::RATIO_16_9;

        $player = new YouTubePlayer($div);
        $player->videoId = $youtubeRow->youtubeId;
        $player->autoPlay = true;

        return parent::getContent();

    }

}