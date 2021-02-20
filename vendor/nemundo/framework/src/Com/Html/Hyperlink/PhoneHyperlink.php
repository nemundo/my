<?php

namespace Nemundo\Com\Html\Hyperlink;


use Nemundo\Html\Hyperlink\AbstractHyperlink;

class PhoneHyperlink extends AbstractHyperlink
{

    /**
     * @var string
     */
    public $phone;
    // phoneNumber

    public function getContent()
    {

        $this->addContent($this->phone);
        $this->href = 'tel:' . $this->phone;

        return parent::getContent();

    }

}