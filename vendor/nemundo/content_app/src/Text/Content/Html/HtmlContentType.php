<?php


namespace Nemundo\Content\App\Text\Content\Html;


use Nemundo\Content\App\Text\Content\LargeText\AbstractLargeTextContentType;


class HtmlContentType extends AbstractLargeTextContentType
{

    public $html;

    protected function loadContentType()
    {
        $this->typeLabel = 'Html';
        $this->typeId = 'e1daa5be-9302-4126-b85b-a79623a3c86c';

        $this->formClassList[] = HtmlContentForm::class;
        $this->viewClassList[] = HtmlContentView::class;

    }


    public function saveType()
    {
        $this->largeText = $this->html;
        parent::saveType();
    }



    public function getSubject()
    {
        return 'Html';
    }

}