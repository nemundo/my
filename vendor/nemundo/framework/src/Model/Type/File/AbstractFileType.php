<?php

namespace Nemundo\Model\Type\File;

use Nemundo\Model\Form\Item\File\FileModelFormItem;
use Nemundo\Model\Type\AbstractModelType;

abstract class AbstractFileType extends AbstractModelType
{

    /**
     * @var bool
     */
    public $keepOrginalFilename = false;

    abstract public function getDataPath();

    abstract public function getUrlPath();

    protected function loadExternalType()
    {
        parent::loadExternalType();

        //$this->formTypeClassName = FileModelFormItem::class;
        /*$this->viewItemClassName = FileModelItem::class;
        $this->tableItemClassName = FileModelItem::class;*/

    }

}