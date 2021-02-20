<?php

require '../config.php';


class TestSite extends \Nemundo\Web\Site\AbstractSite {


    protected function loadSite()
    {

        $this->url = 'hello-world';


    }


    public function loadContent()
    {
        // TODO: Implement loadContent() method.
    }

}



class KeyParameter extends \Nemundo\Web\Parameter\AbstractUrlParameter {

    protected function loadParameter()
    {
    $this->requestName = 'key';
     }

}


$site = new \Paranautik\Site\Test\TestSite();


$parmeter = new \Nemundo\Web\Parameter\UrlParameter('key');
$parmeter->parameterName = 'key';
$parmeter->defaultValue = 'default';
$parmeter->value = 'one';

$site->addParameter($parmeter);

(new \Nemundo\Core\Debug\Debug())->write($site->getUrl());




//$site = new \Nemundo\Web\Site\Site();
//(new \Nemundo\Core\Debug\Debug())->write($site->getUrl());


