<?php

namespace Nemundo\Content\App\File\Content\File;

use Nemundo\Content\View\AbstractContentView;
use Nemundo\Package\Bootstrap\Button\BootstrapUrlButton;

class DownloadButtonView extends AbstractContentView
{
    /**
     * @var FileContentType
     */
    public $contentType;

    public $viewName='Download Button';

    public function getContent()
    {

        $fileRow = $this->contentType->getDataRow();

        $btn = new BootstrapUrlButton($this);
        $btn->content = 'Download';
        $btn->url = $fileRow->file->getUrl();

        return parent::getContent();

    }
}