<?php

namespace Nemundo\Geo\Kml\Container;

use Nemundo\Geo\Kml\Property\Name;
use Nemundo\Geo\Kml\Text\KmlTextConverter;
use Nemundo\Html\Container\AbstractTagContainer;


class Placemark extends AbstractTagContainer
{

    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $label;


    public function getContent()
    {

        $this->tagName = 'Placemark';

        if ($this->label !== null) {
            $name = new Name($this);
            $name->value = (new KmlTextConverter())->getText($this->label);
        }

        return parent::getContent();

    }

}