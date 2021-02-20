<?php


namespace Nemundo\App\MySql\Com\Table;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\App\MySql\Parameter\TableParameter;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Db\Provider\MySql\Index\MySqlIndexReader;
use Nemundo\Db\Provider\MySql\Table\MySqlTableReader;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTable;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Web\Site\Site;

class MySqlIndexTable extends AdminTable
{

    public $tableName;

    public function getContent()
    {

        $header = new TableHeader($this);
        $header->addText('Type');
        $header->addText('Field');

        $reader = new MySqlIndexReader();
        $reader->tableName=$this->tableName;
        foreach ($reader->getData() as $index) {

            $row = new TableRow($this);
            $row->addText($index->indexName);
            $row->addText($index->columnName);

   /*             $row->addText($index->getValue('index_type'));
                $row->addText($index->getValue('column_name'));*/


        }

        return parent::getContent();

    }

}