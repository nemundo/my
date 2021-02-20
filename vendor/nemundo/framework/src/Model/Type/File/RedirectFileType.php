<?php

namespace Nemundo\Model\Type\File;


use Nemundo\Model\Item\File\RedirectFileModelItem;
use Nemundo\Model\ModelConfig;
use Nemundo\Web\Site\AbstractSite;

class RedirectFileType extends FileType
{

    /**
     * @var AbstractSite
     */
    public $redirectSite;

    /*
    protected function loadExternalType()
    {
        parent::loadExternalType();
        $this->tableItemClassName = RedirectFileModelItem::class;
        $this->viewItemClassName = RedirectFileModelItem::class;

    }*/


    public function getDataPath()
    {
        $path = ModelConfig::$redirectDataPath . $this->tableName . DIRECTORY_SEPARATOR . $this->fieldName . DIRECTORY_SEPARATOR;
        return $path;
    }

}