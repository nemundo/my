<?php

namespace Nemundo\Content\Action;


use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Content\Type\AbstractType;

// AbstractAction
abstract class AbstractContentAction extends AbstractType
{

    public $actionLabel;

    public $actionContentId;

    public function onAction() {

    }

}