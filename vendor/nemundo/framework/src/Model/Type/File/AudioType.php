<?php

namespace Nemundo\Model\Type\File;


use Nemundo\Html\Form\Input\AcceptFileType;
use Nemundo\Model\Item\File\AudioModelItem;

class AudioType extends FileType
{

    protected function loadExternalType()
    {
        parent::loadExternalType();
        $this->acceptFileType = AcceptFileType::AUDIO;
        $this->tableItemClassName = AudioModelItem::class;
        $this->viewItemClassName = AudioModelItem::class;
    }

}