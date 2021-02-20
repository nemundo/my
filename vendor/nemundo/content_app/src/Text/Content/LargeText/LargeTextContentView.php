<?php


namespace Nemundo\Content\App\Text\Content\LargeText;


use Nemundo\Core\Type\Text\Html;
use Nemundo\Html\Block\ContentDiv;
use Nemundo\Html\Block\Div;
use Nemundo\Content\View\AbstractContentView;

class LargeTextContentView extends AbstractContentView
{

    /**
     * @var LargeTextContentType
     */
    public $contentType;

    public function getContent()
    {

        $largeTextRow = $this->contentType->getDataRow();

        $p = new ContentDiv($this);
        $p->content = (new Html($largeTextRow->largeText))->getValue();

        return parent::getContent();

    }

}