<?php

namespace Nemundo\Content\Index\Group\Parameter;

use Nemundo\Web\Parameter\AbstractUrlParameter;

class GroupParameter extends AbstractUrlParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'group';
    }
}