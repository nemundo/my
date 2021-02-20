<?php

namespace Nemundo\Content\App\Note\Content\Note;

use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\Content\View\AbstractContentView;
use Nemundo\Core\Type\Text\Html;
use Nemundo\Html\Formatting\Bold;
use Nemundo\Html\Paragraph\Paragraph;

class Note2ContentView extends AbstractContentView
{

    /**
     * @var NoteContentType
     */
    public $contentType;


    public $viewName='Note2';

    public function getContent()
    {

        $noteRow = $this->contentType->getDataRow();

        $subtitle = new AdminSubtitle($this);
        $subtitle->content = $noteRow->title;

        $bold=new Bold($this);
        $bold->content='View2';

        $p = new Paragraph($this);
        $p->content = (new Html($noteRow->text))->getValue();

        return parent::getContent();

    }

}