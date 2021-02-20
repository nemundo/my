<?php


namespace Nemundo\Content\App\Video\Content\YouTube;


use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\Com\Video\YouTube\YouTubePlayer;
use Nemundo\Content\View\AbstractContentView;
use Nemundo\Html\Block\Div;
use Nemundo\Html\Paragraph\Paragraph;


class YouTubeContentView extends AbstractContentView
{

    /**
     * @var YouTubeContentType
     */
    public $contentType;

    public $viewName='Video';

    public function getContent()
    {

        $youtubeRow = $this->contentType->getDataRow();

        /*$subtitle = new AdminSubtitle($this);
        $subtitle->content = $youtubeRow->title;*/

        /*
        <div class="embed-responsive embed-responsive-16by9">
  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
</div>
        */


        $div = new Div($this);
        $div->addCssClass('embed-responsive');

        $player = new YouTubePlayer($div);
        $player->videoId = $youtubeRow->youtubeId;
        $player->autoPlay = true;

        /*$p = new Paragraph($this);
        $p->content = $youtubeRow->description;*/

        return parent::getContent();

    }

}