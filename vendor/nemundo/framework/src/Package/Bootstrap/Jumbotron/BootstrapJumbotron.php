<?php


namespace Nemundo\Package\Bootstrap\Jumbotron;


use Nemundo\Html\Block\Div;
use Nemundo\Html\Container\AbstractHtmlContainer;

class BootstrapJumbotron extends Div
{

    public function getContent()
    {

        $this->addCssClass('jumbotron');
        return parent::getContent();

    }

}