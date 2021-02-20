<?php

namespace Nemundo\Content\App\Note\Content\Note;

use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\Content\View\AbstractContentView;
use Nemundo\Core\Type\Text\Html;
use Nemundo\Html\Paragraph\Paragraph;

class NoteContentView extends AbstractContentView
{

    /**
     * @var NoteContentType
     */
    public $contentType;

    public function getContent()
    {

        $noteRow = $this->contentType->getDataRow();

        $subtitle = new AdminSubtitle($this);
        $subtitle->content = $noteRow->title;

        $p = new Paragraph($this);
        $p->content = (new Html($noteRow->text))->getValue();

        return parent::getContent();

    }

}