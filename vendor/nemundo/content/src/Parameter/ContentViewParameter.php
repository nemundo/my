<?php


namespace Nemundo\Content\Parameter;


use Nemundo\Web\Parameter\AbstractUrlParameter;


class ContentViewParameter extends AbstractUrlParameter
{

    protected function loadParameter()
    {
        $this->parameterName = 'view';
    }

}