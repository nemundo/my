<?php

namespace Nemundo\Content\App\ImageTimeline\Page;

use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Com\Template\AbstractTemplateDocument;

class ImageTimelinePage extends AbstractTemplateDocument
{
    public function getContent()
    {


        $form=new SearchForm($this);








        return parent::getContent();
    }
}