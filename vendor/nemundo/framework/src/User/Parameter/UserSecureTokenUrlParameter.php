<?php

namespace Nemundo\User\Parameter;

use Nemundo\Web\Parameter\AbstractUrlParameter;

class UserSecureTokenUrlParameter extends AbstractUrlParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'secure-token';
    }
}