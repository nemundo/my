<?php

namespace Nemundo\Package\Bootstrap\Table;


use Nemundo\Model\Table\AbstractModelTable;

class BootstrapModelTable extends AbstractModelTable
{

    public function getContent()
    {

        $this->addCssClass('table');
        $this->addCssClass('table-hover');
        $this->addCssClass('table-sm');

        return parent::getContent();
    }

}