<?php


namespace Nemundo\Content\App\Log\Content\LogMessage;


use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Content\App\Log\Data\LogMessage\LogMessagePaginationReader;
use Nemundo\Content\Index\Tree\Type\AbstractParentContentListing;
use Nemundo\Db\Sql\Order\SortOrder;

class LogMessageParentContentList extends AbstractParentContentListing
{

    public function getContent()
    {

        $table=new AdminTable($this);

        $reader=new LogMessagePaginationReader();
        $reader->addOrder($reader->model->dateTime,SortOrder::DESCENDING);
        foreach ($reader->getData() as $messageRow) {

            $row=new TableRow($table);
            $row->addText($messageRow->message);
            $row->addText($messageRow->dateTime->getShortDateLeadingZeroFormat());

        }


        return parent::getContent();

    }

}