<?php

namespace Nemundo\Content\App\FileTransfer\Content\FileTransfer;

use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Content\App\File\Com\Table\FileParentTable;
use Nemundo\Content\App\File\Content\File\FileContentType;
use Nemundo\Content\View\AbstractContentView;

class FileTransferContentView extends AbstractContentView
{
    /**
     * @var FileTransferContentType
     */
    public $contentType;

    public function getContent()
    {

        $title=new AdminTitle($this);
        $title->content=$this->contentType->getSubject();

        $fileContentType = new FileContentType();
        $fileContentType->parentId=$this->contentType->getContentId();
        $fileContentType->getDefaultForm($this);

        $table=new FileParentTable($this);
        $table->parentId=$this->contentType->getContentId();

        return parent::getContent();

    }

}