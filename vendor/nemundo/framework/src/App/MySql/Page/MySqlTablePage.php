<?php

namespace Nemundo\App\MySql\Page;

use Nemundo\App\MySql\Com\Table\MySqlIndexTable;
use Nemundo\App\MySql\Com\Table\MySqlTableFieldTable;
use Nemundo\App\MySql\Parameter\TableParameter;
use Nemundo\App\MySql\Template\MySqlTemplate;

class MySqlTablePage extends MySqlTemplate
{

    public function getContent()
    {

        $tableName = (new TableParameter())->getValue();

        $table = new MySqlTableFieldTable($this);
        $table->tableName = $tableName;

        $table = new MySqlIndexTable($this);
        $table->tableName = $tableName;


        return parent::getContent();
    }
}