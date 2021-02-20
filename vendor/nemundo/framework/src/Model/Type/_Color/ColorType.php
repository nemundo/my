<?php

namespace Nemundo\Model\Type\Color;


use Nemundo\Model\Type\Complex\AbstractComplexType;
use Nemundo\Model\Type\Number\NumberType;

class ColorType extends AbstractComplexType
{


    /**
     * @var NumberType
     */
    public $r;

    /**
     * @var NumberType
     */
    public $g;

    /**
     * @var NumberType
     */
    public $b;


    // rgb value

    protected function loadExternalType()
    {

        $this->r = new NumberType($this);
        $this->g = new NumberType($this);
        $this->b = new NumberType($this);


    }


    public function createObject()
    {


    }


}