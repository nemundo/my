<?php

namespace Nemundo\Package\Popper;


use Nemundo\Com\Package\AbstractPackage;

class PopperPackage extends AbstractPackage
{

    protected function loadPackage()
    {

        $this->packageName = 'popper';

        $this->addJs('popper.min.js');

    }

}