<?php

namespace Nemundo\App\ModelDesigner\Com\Form;


use Nemundo\App\ModelDesigner\Builder\TypeBuilder;
use Nemundo\App\ModelDesigner\Com\ListBox\TypeListBox;
use Nemundo\App\ModelDesigner\Json\AppJson;
use Nemundo\App\ModelDesigner\Parameter\AppParameter;
use Nemundo\Model\Definition\Index\AbstractModelIndex;
use Nemundo\Model\Definition\Model\AbstractModel;
use Nemundo\Orm\Model\AbstractOrmModel;
use Nemundo\Package\Bootstrap\Form\BootstrapForm;

class IndexTypeForm extends BootstrapForm
{

    /**
     * @var AppJson
     */
    public $app;

    /**
     * @var AbstractOrmModel
     */
    public $model;

    /**
     * @var AbstractModelIndex
     */
    public $index;

    /**
     * @var TypeListBox
     */
    public $type;

    public function getContent()
    {

        $this->type = new TypeListBox($this);
        $this->type->model = $this->model;
//$this->type->submitOnChange=true;


        return parent::getContent();

    }


    protected function onSubmit()
    {


        $type = (new TypeBuilder())->getTypeFromModel($this->model, $this->type->getValue());
        $this->index->addType($type);


        $this->app->writeJson();

    }


}