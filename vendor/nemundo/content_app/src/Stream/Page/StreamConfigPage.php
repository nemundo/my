<?php

namespace Nemundo\Content\App\Stream\Page;

use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\App\Stream\Collection\StreamContentTypeCollection;
use Nemundo\Content\Com\Admin\ContentTypeCollectionAdmin;

class StreamConfigPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $admin=new ContentTypeCollectionAdmin($this);
        $admin->contentTypeCollection=new StreamContentTypeCollection();


        return parent::getContent();
    }
}