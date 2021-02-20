<?php

namespace Nemundo\Content\App\Widget\Content\UniqueId;

use Nemundo\Content\View\AbstractContentView;
use Nemundo\Core\Random\UniqueId;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;

class UniqueIdContentView extends AbstractContentView
{
    /**
     * @var UniqueIdContentType
     */
    public $contentType;

    public function getContent()
    {

        $textbox = new BootstrapTextBox($this);
        $textbox->label = 'Unique Id';
        $textbox->value = (new UniqueId())->getUniqueId();

        return parent::getContent();

    }
}