<?php

namespace Nemundo\Content\App\Video\Content\IframeVideo;

use Nemundo\Content\View\AbstractContentView;
use Nemundo\Html\Iframe\Iframe;
use Nemundo\Package\Bootstrap\Helper\Ratio\BootstrapRatioDiv;

class IframeVideoContentView extends AbstractContentView
{
    /**
     * @var IframeVideoContentType
     */
    public $contentType;

    public function getContent()
    {

        $div = new BootstrapRatioDiv($this);

        $iframe = new Iframe($div);
        $iframe->src = $this->contentType->getDataRow()->sourceUrl;
        $iframe->addAttributeWithoutValue('allowfullscreen');


        return parent::getContent();
    }
}