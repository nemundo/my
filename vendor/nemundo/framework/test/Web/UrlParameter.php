<?php

require '../config.php';


class KeyParameter extends \Nemundo\Web\Parameter\AbstractUrlParameter
{

    protected function loadParameter()
    {
        $this->parameterName = 'key';
        $this->defaultValue = 'default';
    }

}


$parameter = new KeyParameter();
(new \Nemundo\Core\Debug\Debug())->write($parameter->getValue());



//$parameter = new KeyParameter(123);

//$parameter->value = 123;



//(new \Nemundo\Core\Debug\Debug())->write($parameter->getUrl());



//$parameter = new \Nemundo\Web\Parameter\UrlParameter();




