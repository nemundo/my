<?php

namespace Nemundo\Content\App\Note\Content\Note;

use Nemundo\Content\Form\AbstractContentForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapLargeTextBox;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;

class NoteTitleContentForm extends AbstractContentForm
{

    /**
     * @var NoteContentType
     */
    public $contentType;

    public $formName='New (only Title)';


    /**
     * @var BootstrapTextBox
     */
    private $noteTitle;



    public function getContent()
    {

        $this->noteTitle = new BootstrapTextBox($this);
        $this->noteTitle->label = 'Title';
        $this->noteTitle->validation = true;


        return parent::getContent();
    }


    protected function loadUpdateForm()
    {

        $noteRow = $this->contentType->getDataRow();
        $this->noteTitle->value = $noteRow->title;

    }


    public function onSubmit()
    {

        $this->contentType->title = $this->noteTitle->getValue();
        $this->contentType->saveType();

    }

}