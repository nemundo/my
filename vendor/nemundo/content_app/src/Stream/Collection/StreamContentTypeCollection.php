<?php

namespace Nemundo\Content\App\Stream\Collection;


use Nemundo\Content\App\Text\Content\RichText\RichTextContentType;
use Nemundo\Content\App\Video\Content\YouTube\YouTubeContentType;
use Nemundo\Content\Collection\AbstractContentTypeCollection;

class StreamContentTypeCollection extends AbstractContentTypeCollection
{

    protected function loadCollection()
    {

        $this->collection = 'Stream';
        $this->collectionId='bda9a1b3-e6ef-4ee1-88ce-29ceca965667';

        $this->loadData();

        //$this->addContentType(new YouTubeContentType());
        //$this->addContentType(new RichTextContentType());

        // TODO: Implement loadCollection() method.
    }

}