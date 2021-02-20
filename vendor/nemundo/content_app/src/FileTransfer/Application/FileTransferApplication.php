<?php

namespace Nemundo\Content\App\FileTransfer\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Content\App\FileTransfer\Data\FileTransferModelCollection;

class FileTransferApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->application = 'File Transfer';
        $this->applicationId = '1b41cfa5-8804-40fd-b5d3-98c162c57559';
        $this->modelCollectionClass=FileTransferModelCollection::class;
    }
}