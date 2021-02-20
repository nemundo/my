<?php

namespace Nemundo\Model\Type;

use Nemundo\Core\Validation\ValidationType;
use Nemundo\Db\Sql\Field\AbstractColumnField;
use Nemundo\Model\Data\Property\AbstractDataProperty;
use Nemundo\Model\Definition\Model\AbstractModel;
use Nemundo\Model\Form\Item\AbstractModelFormItem;

use Nemundo\Model\Type\Property\ModelVisible;


abstract class AbstractModelType extends AbstractColumnField
{

    /**
     * @var string|string[]
     */
    public $label;

    /**
     * @var string
     */
    public $defaultValue;

    /**
     * @var bool
     */
    public $allowNullValue = false;
    // allowNull

    /**
     * @var bool
     */
    public $fieldMapping = true;

    /**
     * @var ModelVisible
     */
    //public $visible;

    /**
     * @var bool
     */
    //public $validation = false;

    /**
     * @var AbstractModelFormItem
     */
    //public $formTypeClassName;
// formItemClassName
// formClassName

    /**
     * @var AbstractModelItem
     */
    //public $tableItemClassName;
    // tableClassName

    /**
     * @var AbstractModelItem
     */
    //public $viewItemClassName;
    // viewClassName


    /**
     * @var AbstractDataProperty
     */
    public $dataPropertyClassName;

    /**
     * @var AbstractDataProperty
     */
    public $updatePropertyClassName;

    /**
     * @var ValidationType
     */
    //public $validationType = ValidationType::IS_VALUE;


    public function __construct(AbstractModel $model = null)
    {

        //parent::__construct($model);

        if ($model !== null) {
            $model->addType($this);
        }

        //$this->visible = new ModelVisible();

        $this->loadExternalType();

    }


    // loadType
    protected function loadExternalType()
    {
    }


    /*
    public function getFieldType()
    {
        return $this->fieldType;
    }*/


    public function checkField()
    {

        $returnValue = true;

        if (!$this->checkProperty('fieldName')) {
            $returnValue = false;
        }

        return $returnValue;

    }

}