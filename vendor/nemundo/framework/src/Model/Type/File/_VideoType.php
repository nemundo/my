<?php

namespace Nemundo\Model\Type\File;


use Nemundo\Html\Form\Input\AcceptFileType;
use Nemundo\Model\Item\File\VideoModelItem;

class VideoType extends FileType
{

    protected function loadExternalType()
    {
        parent::loadExternalType();
        $this->tableItemClassName = VideoModelItem::class;
        $this->viewItemClassName = VideoModelItem::class;
        $this->acceptFileType = AcceptFileType::VIDEO;
    }

}