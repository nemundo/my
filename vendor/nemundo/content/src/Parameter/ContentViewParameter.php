<?php


namespace Nemundo\Content\Parameter;


use Nemundo\Web\Parameter\AbstractUrlParameter;

// ViewParameter
class ContentViewParameter extends AbstractUrlParameter
{

    protected function loadParameter()
    {
        $this->parameterName = 'view';

    }


    /*
    public function getValue()
    {

        $value = null;
        if ($this->hasValue()) {
            $value=parent::getValue();
        }

        return $value;

    }*/


}