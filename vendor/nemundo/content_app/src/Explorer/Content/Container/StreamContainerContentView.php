<?php

namespace Nemundo\Content\App\Explorer\Content\Container;

use Nemundo\Content\View\AbstractContentView;
use Nemundo\Core\Type\Text\Html;
use Nemundo\Html\Block\Hr;
use Nemundo\Html\Paragraph\Paragraph;

class StreamContainerContentView extends AbstractContentView
{
    /**
     * @var ContainerContentType
     */
    public $contentType;


    public $viewName = 'Stream';


    public function getContent()
    {

        $p = new Paragraph($this);
        $p->content = (new Html($this->contentType->getDataRow()->description))->getValue();

        foreach ($this->contentType->getChild() as $contentRow) {

            $contentType = $contentRow->child->getContentType();
            $contentType->getDefaultView($this);

            (new Hr($this));

        }

        return parent::getContent();
    }
}