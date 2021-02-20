<?php

namespace Nemundo\Model\Type\File;


use Nemundo\Html\Form\Input\AcceptFileType;
use Nemundo\Model\Definition\Model\MultiRedirectFilenameModel;
use Nemundo\Model\Form\Item\File\MultiRedirectFilenameModelFormItem;
use Nemundo\Model\Item\File\MultiRedirectFilenameModelItem;
use Nemundo\Model\ModelConfig;
use Nemundo\Model\Type\External\AbstractExternalComplexType;
use Nemundo\Web\Site\AbstractSite;

class MultiRedirectFilenameType extends AbstractExternalComplexType
{

    /**
     * @var AcceptFileType
     */
    public $acceptFileType;

    /**
     * @var AbstractSite
     */
    public $redirectSite;

    protected function loadExternalType()
    {
        $this->fieldMapping = false;
        $this->formTypeClassName = MultiRedirectFilenameModelFormItem::class;
        $this->tableItemClassName = MultiRedirectFilenameModelItem::class;
        $this->viewItemClassName = MultiRedirectFilenameModelItem::class;

    }


    public function getExternalModel()
    {

        $model = new MultiRedirectFilenameModel();
        $model->tableName = $this->tableName . '_' . $this->fieldName . '_multi_redirect';

        $model->file->file->tableName = $model->tableName;
        $model->file->file->redirectSite = $this->redirectSite;

        return $model;

    }


    public function getDataPath()
    {

        $path = ModelConfig::$redirectDataPath . $this->tableName . DIRECTORY_SEPARATOR . $this->fieldName . DIRECTORY_SEPARATOR;
        return $path;

    }

}