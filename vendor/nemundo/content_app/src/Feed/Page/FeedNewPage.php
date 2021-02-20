<?php

namespace Nemundo\Content\App\Feed\Page;

use Nemundo\Content\App\Feed\Content\Feed\FeedContentType;
use Nemundo\Content\App\Feed\Template\FeedTemplate;

class FeedNewPage extends FeedTemplate
{
    public function getContent()
    {

        (new FeedContentType())->getDefaultForm($this);
        return parent::getContent();

    }
}