<?php

namespace Nemundo\Content\App\Explorer\Content\PrivateShare;

use Nemundo\Content\Form\AbstractContentForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapLargeTextBox;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;

class PrivateShareContentForm extends AbstractContentForm
{
    /**
     * @var PrivateShareContentType
     */
    public $contentType;

    /**
     * @var BootstrapTextBox
     */
    private $email;

    /**
     * @var BootstrapLargeTextBox
     */
    private $message;

    public function getContent()
    {

        $this->email=new BootstrapTextBox($this);
        $this->email->label='Email';
        $this->email->validation=true;

        $this->message=new BootstrapLargeTextBox($this);
        $this->message->label='Message';
        $this->message->value = 'Hallo ...';

        return parent::getContent();
    }

    public function onSubmit()
    {

        $this->contentType->email=$this->email->getValue();
        $this->contentType->message=$this->message->getValue();
        $this->contentType->saveType();

    }
}