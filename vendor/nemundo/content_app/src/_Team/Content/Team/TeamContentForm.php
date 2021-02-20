<?php

namespace Nemundo\Content\App\Team\Content\Team;

use Nemundo\Content\App\Team\Data\Team\TeamModel;
use Nemundo\Content\Form\AbstractContentForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;

class TeamContentForm extends AbstractContentForm
{
    /**
     * @var TeamContentType
     */
    public $contentType;

    /**
     * @var BootstrapTextBox
     */
    private $team;

    public function getContent()
    {

        $model = new TeamModel();

        $this->team = new BootstrapTextBox($this);
        $this->team->label = $model->team->label;
        $this->team->validation = true;

        return parent::getContent();
    }

    public function onSubmit()
    {
        $this->contentType->team=$this->team->getValue();
        $this->contentType->saveType();
    }
}