<?php


namespace Nemundo\Content\Com\Form;


use Nemundo\Package\Bootstrap\Form\BootstrapForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;
use Nemundo\Content\Data\Content\ContentReader;
use Nemundo\Content\Form\AbstractContentForm;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Content\Type\TreeContentType;
use Nemundo\Content\Writer\TreeWriter;


// Two Way possible
// AttachTo


class AddForm extends BootstrapForm  // AbstractContentForm
{


    /**
     * @var AbstractContentType
     */
    public $parentContentType;


    /**
     * @var AbstractContentType
     */
    public $contentType;


    public function getContent()
    {

        $this->submitButton->label='Add';

        return parent::getContent();
    }


    protected function onSubmit()
    {

        $writer = new TreeWriter();
        $writer->parentId = $this->parentContentType->getContentId();
        $writer->childId = $this->contentType->getContentId();
        $writer->write();

    }

}