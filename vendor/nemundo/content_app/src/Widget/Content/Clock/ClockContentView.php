<?php

namespace Nemundo\Content\App\Widget\Content\Clock;

use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Content\View\AbstractContentView;
use Nemundo\Core\Type\DateTime\DateTime;

class ClockContentView extends AbstractContentView
{
    /**
     * @var ClockContentType
     */
    public $contentType;

    public function getContent()
    {

        $title = new AdminTitle($this);
        $title->content = (new DateTime())->setNow()->getTimeLeadingZero();

        return parent::getContent();

    }
}