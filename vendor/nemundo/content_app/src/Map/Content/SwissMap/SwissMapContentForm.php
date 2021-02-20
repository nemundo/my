<?php

namespace Nemundo\Content\App\Map\Content\SwissMap;

use Nemundo\Content\Form\AbstractContentForm;

class SwissMapContentForm extends AbstractContentForm
{
    /**
     * @var SwissMapContentType
     */
    public $contentType;

    public function getContent()
    {
        return parent::getContent();
    }

    public function onSubmit()
    {
        $this->contentType->saveType();
    }
}