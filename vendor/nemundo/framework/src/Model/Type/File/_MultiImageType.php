<?php

namespace Nemundo\Model\Type\File;


use Nemundo\Html\Form\Input\AcceptFileType;

class MultiImageType extends MultiFileType
{


    protected function loadExternalType()
    {

        parent::loadExternalType();
        $this->acceptFileType = AcceptFileType::IMAGE;

    }

}