<?php


namespace Nemundo\Content\App\Text\Content\Html;


use Nemundo\Package\Bootstrap\FormElement\BootstrapLargeTextBox;
use Nemundo\Content\Form\AbstractContentForm;

class HtmlContentForm extends AbstractContentForm
{

    /**
     * @var BootstrapLargeTextBox
     */
    private $html;

    /**
     * @var HtmlContentType
     */
    public $contentType;

    public function getContent()
    {

        $this->html = new BootstrapLargeTextBox($this);
        $this->html->label = 'Html';

        return parent::getContent();
    }


    protected function loadUpdateForm()
    {

        $largeTextRow = $this->contentType->getDataRow();
        $this->html->value = $largeTextRow->largeText;

    }

    protected function onSubmit()
    {

        $this->contentType->html = $this->html->getValue();
        $this->contentType->saveType();

    }

}