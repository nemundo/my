<?php

namespace Nemundo\Model\Type\File;


use Nemundo\Html\Form\Input\AcceptFileType;
use Nemundo\Model\Definition\Model\MultiFileModel;
use Nemundo\Model\Definition\Model\TypeListTrait;
use Nemundo\Model\Form\Item\File\MultiFileModelFormItem;
use Nemundo\Model\Item\File\MultiFileModelItem;
use Nemundo\Model\Type\External\AbstractExternalComplexType;

class MultiFileType extends AbstractExternalComplexType
{

    use TypeListTrait;

    /**
     * @var AcceptFileType
     */
    public $acceptFileType;


    protected function loadExternalType()
    {

        $this->fieldMapping = false;
        $this->formTypeClassName = MultiFileModelFormItem::class;
        $this->tableItemClassName = MultiFileModelItem::class;
        $this->viewItemClassName = MultiFileModelItem::class;

    }


    public function getExternalModel()
    {

        $tableName = $this->tableName . '_' . $this->fieldName . '_multi_file';

        $model = new MultiFileModel();
        $model->tableName = $tableName;
        $model->aliasTableName = $tableName;
        $model->file->tableName = $tableName;

        return $model;

    }

}