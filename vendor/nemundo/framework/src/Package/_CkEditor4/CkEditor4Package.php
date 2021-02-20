<?php

namespace Nemundo\Package\CkEditor4;


use Nemundo\Com\Package\AbstractPackage;

class CkEditor4Package extends AbstractPackage
{

    protected function loadPackage()
    {

        $this->packageName = 'ckeditor4';
        $this->addJs('ckeditor.js');

    }

}