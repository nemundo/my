<?php

namespace Nemundo\Content\App\ImageGallery\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Content\App\ImageGallery\Data\ImageGalleryModelCollection;
use Nemundo\Content\App\ImageGallery\Install\ImageGalleryInstall;

class ImageGalleryApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->application = 'Image Gallery';
        $this->applicationId = 'fa37cca0-7700-44ad-b65a-3b534407e9b1';
        $this->modelCollectionClass=ImageGalleryModelCollection::class;
        $this->installClass=ImageGalleryInstall::class;
    }
}