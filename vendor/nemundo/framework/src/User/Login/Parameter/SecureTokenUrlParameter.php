<?php

namespace Nemundo\User\Login\Parameter;


use Nemundo\Web\Parameter\AbstractUrlParameter;

class SecureTokenUrlParameter extends AbstractUrlParameter
{

    protected function loadParameter()
    {
        $this->parameterName = 'secure-token';
    }

}