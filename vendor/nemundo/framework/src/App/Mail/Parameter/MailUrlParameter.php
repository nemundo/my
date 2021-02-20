<?php

namespace Nemundo\App\Mail\Parameter;


use Nemundo\Web\Parameter\AbstractUrlParameter;

class MailUrlParameter extends AbstractUrlParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'mail';
    }
}