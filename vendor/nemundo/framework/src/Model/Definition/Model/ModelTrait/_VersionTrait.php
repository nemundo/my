<?php

namespace Nemundo\Model\Definition\Model\ModelTrait;


use Nemundo\Model\Type\Number\NumberType;

trait VersionTrait
{

    use UserDateTimeModelTrait;

    /**
     * @var NumberType
     */
    public $version;

    protected function loadVersionTrait()
    {

        $this->version = new NumberType($this);
        $this->version->label = 'Version';
        $this->version->fieldName = 'version';
        $this->version->visible->form = false;

        $this->loadUserDateTimeTrait();

    }


}