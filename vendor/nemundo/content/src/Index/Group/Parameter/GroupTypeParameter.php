<?php

namespace Nemundo\Content\Index\Group\Parameter;

use Nemundo\Web\Parameter\AbstractUrlParameter;

class GroupTypeParameter extends AbstractUrlParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'group-type';
    }
}