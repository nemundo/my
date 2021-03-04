<?php

namespace Nemundo\Content\App\Stream\Install;

use Nemundo\Content\App\Stream\Action\StreamContentAction;
use Nemundo\Content\App\Stream\Action\StreamDeleteContentAction;
use Nemundo\Content\App\Stream\Collection\StreamContentTypeCollection;
use Nemundo\Content\App\Stream\Data\StreamModelCollection;
use Nemundo\Content\Setup\ContentActionSetup;
use Nemundo\Content\Setup\ContentTypeCollectionSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;

class StreamInstall extends AbstractInstall
{
    public function install()
    {

        (new ModelCollectionSetup())
            ->addCollection(new StreamModelCollection());

        (new ContentActionSetup())
            ->addContentAction(new StreamDeleteContentAction())
            ->addContentAction(new StreamContentAction());

        (new ContentTypeCollectionSetup())
            ->addContentTypeCollection(new StreamContentTypeCollection());

    }
}