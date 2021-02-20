<?php

namespace Nemundo\Model\Item;


use Nemundo\Com\Html\Hyperlink\PhoneHyperlink;


class PhoneItem extends AbstractModelItem
{


    public function getContent()
    {


        /*
        $phone = $this->getValue();
        $url = '';
        if ($phone !== '') {
            $url = 'tel:' . $phone;
        }*/

        $hyperlink = new PhoneHyperlink($this);  // new Hyperlink($this);
        $hyperlink->phone = $this->getValue();
        //$hyperlink->content = $phone;
        //$hyperlink->url = $url;


        return parent::getContent();
    }

}