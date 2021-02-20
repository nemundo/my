<?php

namespace Nemundo\Admin\Help\Parameter;


use Nemundo\Web\Parameter\AbstractUrlParameter;

class HelpParameter extends AbstractUrlParameter
{

    protected function loadParameter()
    {
        $this->parameterName = 'help';
    }

}