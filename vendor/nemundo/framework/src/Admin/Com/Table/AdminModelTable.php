<?php


namespace Nemundo\Admin\Com\Table;


use Nemundo\Model\Table\AbstractModelTable;

class AdminModelTable extends AbstractModelTable
{

    public function getContent()
    {

        $this->addCssClass('table');
        $this->addCssClass('table-hover');

        return parent::getContent();

    }

}