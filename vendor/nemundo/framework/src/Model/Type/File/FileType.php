<?php

namespace Nemundo\Model\Type\File;


use Nemundo\Html\Form\Input\AcceptFileType;
use Nemundo\Model\Form\Item\File\FileModelFormItem;
use Nemundo\Model\Item\File\FileModelItem;
use Nemundo\Model\ModelConfig;
use Nemundo\Core\Http\Domain\DomainInformation;


class FileType extends AbstractFileType
{

    /**
     * @var AcceptFileType
     */
    public $acceptFileType;


    /*protected function loadExternalType()
    {
        parent::loadExternalType();

        $this->formTypeClassName = FileModelFormItem::class;
        $this->viewItemClassName = FileModelItem::class;
        $this->tableItemClassName = FileModelItem::class;

    }*/


    public function getDataPath()
    {
        $path = ModelConfig::$dataPath . $this->tableName . DIRECTORY_SEPARATOR . $this->fieldName . DIRECTORY_SEPARATOR;
        return $path;
    }


    public function getUrlPath()
    {

        $url = ModelConfig::$dataUrl . $this->tableName . '/' . $this->fieldName . '/';
        return $url;
    }


    public function getFullUrlPath()
    {
        $url = (new DomainInformation())->getDomain() . $this->getUrlPath();
        return $url;
    }

}
