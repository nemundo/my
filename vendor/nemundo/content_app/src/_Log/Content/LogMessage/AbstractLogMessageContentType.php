<?php

namespace Nemundo\Content\App\Log\Content\LogMessage;

use Nemundo\Content\App\Log\Data\LogMessage\LogMessage;
use Nemundo\Content\App\Log\Data\LogMessage\LogMessageDelete;
use Nemundo\Content\App\Log\Data\LogMessage\LogMessageReader;
use Nemundo\Content\App\Log\Data\LogMessage\LogMessageRow;
use Nemundo\Content\Index\Tree\Type\AbstractTreeContentType;

abstract class AbstractLogMessageContentType extends AbstractTreeContentType
{

    public $message='[No Message]';

    /*
    protected function loadContentType()
    {
        $this->typeLabel = 'LogMessage';
        $this->typeId = '7d128340-92c2-428e-b0c9-b2855d5d9de1';
        //$this->viewClassList[]  = LogMessageContentView::class;
        //$this->listClass=LogMessageParentContentList::class;
    }*/

    protected function onCreate()
    {

        $data = new LogMessage();
        $data->message = $this->message;
        $this->dataId= $data->save();

    }


    protected function onDelete()
    {
        (new LogMessageDelete())->deleteById($this->dataId);
    }


    protected function onDataRow()
    {
        $this->dataRow=(new LogMessageReader())->getRowById($this->dataId);
    }

    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow|LogMessageRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }

    public function getSubject()
    {
        return $this->getDataRow()->message;
    }


}