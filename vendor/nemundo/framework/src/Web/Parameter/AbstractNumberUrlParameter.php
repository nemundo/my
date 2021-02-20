<?php


namespace Nemundo\Web\Parameter;


abstract class AbstractNumberUrlParameter extends AbstractUrlParameter
{

    /**
     * @var int
     */
    public $defaultValue = 0;

    public function getValue()
    {
        return (int)parent::getValue();
    }

}