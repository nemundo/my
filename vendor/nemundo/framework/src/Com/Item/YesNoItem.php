<?php

namespace Nemundo\Com\Item;


use Nemundo\Package\FontAwesome\Icon\CheckIcon;


class YesNoItem extends AbstractItem
{

    /**
     * @var bool
     */
    public $value = false;


    public function getContent()
    {

        if ($this->value) {
            new CheckIcon($this);
        } else {
            $this->addContent('&nbsp;');
        }

        return parent::getContent();
    }


}