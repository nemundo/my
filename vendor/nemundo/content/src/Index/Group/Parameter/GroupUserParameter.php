<?php

namespace Nemundo\Content\Index\Group\Parameter;

use Nemundo\Web\Parameter\AbstractUrlParameter;

class GroupUserParameter extends AbstractUrlParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'group-user';
    }
}