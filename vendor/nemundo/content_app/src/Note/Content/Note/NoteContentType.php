<?php

namespace Nemundo\Content\App\Note\Content\Note;

use Nemundo\Content\App\Note\Data\Note\Note;
use Nemundo\Content\App\Note\Data\Note\NoteReader;
use Nemundo\Content\App\Note\Data\Note\NoteRow;
use Nemundo\Content\App\Note\Data\Note\NoteUpdate;
use Nemundo\Content\Index\Tree\Type\AbstractTreeContentAdmin;
use Nemundo\Content\Index\Tree\Type\AbstractTreeContentType;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Content\Type\AbstractSearchContentType;

class NoteContentType extends AbstractSearchContentType   //ContentType  // AbstractTreeContentType
{

    public $title;

    public $text;

    protected function loadContentType()
    {

        $this->typeLabel = 'Note';
        $this->typeId = 'cddfe2b6-982b-495f-b5fb-ca64e25c9a33';


        $this->formClassList[] = NoteContentForm::class;
        $this->formClassList[] = NoteTitleContentForm::class;

        $this->viewClassList[] = NoteContentView::class;
        $this->viewClassList[] = Note2ContentView::class;

        //$this->allowChild=false;

    }

    protected function onCreate()
    {

        $data = new Note();
        $data->title = $this->title;
        $data->text = $this->text;
        $this->dataId = $data->save();

    }

    protected function onUpdate()
    {

        $update = new NoteUpdate();
        $update->title = $this->title;
        $update->text = $this->text;
        $update->updateById($this->dataId);

    }


    protected function onIndex()
    {

        $noteRow=$this->getDataRow();

        $this->addSearchText($noteRow->title);
        $this->addSearchText($noteRow->text);

      //  $this->saveGroupDocumentIndex();

    }


    protected function onDataRow()
    {
        $this->dataRow = (new NoteReader())->getRowById($this->dataId);
    }

    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow|NoteRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }


    public function getSubject()
    {
        return $this->getDataRow()->title;
    }


}