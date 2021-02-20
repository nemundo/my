<?php

namespace Nemundo\Geo\Kml\Style;


use Nemundo\Html\Container\AbstractTagContainer;

class Style extends AbstractTagContainer
{

    public function getContent()
    {

        $this->tagName = 'Style';
        return parent::getContent();

    }

}