<?php

namespace Nemundo\Content\App\Widget\Content\UniqueId;

use Nemundo\Content\Form\ContentForm;
use Nemundo\Content\Index\Tree\Type\AbstractTreeContentType;

class UniqueIdContentType extends AbstractTreeContentType
{

    protected function loadContentType()
    {
        $this->typeLabel = 'Unique Id';
        $this->typeId = '25079b37-68ac-4098-b7ac-ec0083c2743f';
        $this->formClassList[] = ContentForm::class;
        $this->viewClassList[]  = UniqueIdContentView::class;

        $this->dataId = 0;

    }

}