<?php

namespace Nemundo\Content\Index\Search\Application;


use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Content\Index\Search\Data\SearchModelCollection;
use Nemundo\Content\Index\Search\Install\SearchIndexInstall;
use Nemundo\Content\Index\Search\Site\SearchSite;

class SearchApplication extends AbstractApplication
{

    protected function loadApplication()
    {
        $this->application = 'Search';
        $this->applicationId = '05f06170-f360-4207-ab09-1c8d17370c77';
        $this->modelCollectionClass = SearchModelCollection::class;
        $this->installClass = SearchIndexInstall::class;
        $this->siteClass = SearchSite::class;
    }

}