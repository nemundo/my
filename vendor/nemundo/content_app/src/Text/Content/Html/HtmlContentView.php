<?php


namespace Nemundo\Content\App\Text\Content\Html;


use Nemundo\Html\Block\ContentDiv;
use Nemundo\Html\Block\Div;
use Nemundo\Content\View\AbstractContentView;

class HtmlContentView extends AbstractContentView
{

    /**
     * @var HtmlContentType
     */
    public $contentType;

    public function getContent()
    {

        $largeTextRow = $this->contentType->getDataRow();

        $div = new ContentDiv($this);
        $div->content = $largeTextRow->largeText;

        return parent::getContent();

    }

}