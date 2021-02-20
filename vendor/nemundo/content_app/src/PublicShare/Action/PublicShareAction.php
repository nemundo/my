<?php

namespace Nemundo\Content\App\PublicShare\Action;


use Nemundo\Content\Action\AbstractContentAction;
use Nemundo\Content\App\PublicShare\Data\PublicShare\PublicShare;


class PublicShareAction extends AbstractContentAction
{

    protected function loadContentType()
    {

        $this->typeLabel = 'Public Share';
        $this->typeId = 'e32bf906-941a-43aa-b153-610c87155bc0';
        $this->actionLabel = 'Share (public)';

        $this->viewClassList[]= PublicShareView::class;

    }


    public function onAction()
    {

        $data = new PublicShare();
        $data->ignoreIfExists = true;
        $data->contentId = $this->actionContentId;
        $data->save();

    }


}