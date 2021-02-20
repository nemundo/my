<?php


namespace Nemundo\Content\App\Text\Content\Text;


use Nemundo\Content\View\AbstractContentView;
use Nemundo\Html\Block\ContentDiv;

class TextContentView extends AbstractContentView
{

    /**
     * @var TextContentType
     */
    public $contentType;

    public $viewName = 'default';

    public function getContent()
    {

        $textRow = $this->contentType->getDataRow();

        $p = new ContentDiv($this);
        $p->content = $textRow->text;

        return parent::getContent();

    }

}