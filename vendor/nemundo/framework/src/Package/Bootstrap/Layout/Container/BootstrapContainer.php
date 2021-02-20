<?php

namespace Nemundo\Package\Bootstrap\Layout\Container;


use Nemundo\Html\Container\AbstractHtmlContainer;

class BootstrapContainer extends AbstractHtmlContainer
{

    /**
     * @var bool
     */
    public $fullWidth = false;


    public function getContent()
    {

        $this->tagName = 'div';

        if ($this->fullWidth) {
            $this->addCssClass('container-fluid');
        } else {
            $this->addCssClass('container');
        }

        return parent::getContent();

    }

}
