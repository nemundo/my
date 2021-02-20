<?php

namespace Nemundo\Content\App\Explorer\Content\Base;


use Nemundo\Content\App\Explorer\Collection\BaseContentTypeCollection;
use Nemundo\Content\App\Explorer\Content\Container\AbstractContainerContentType;
use Nemundo\Content\App\Explorer\Content\Container\ContainerContentView;


class BaseContainerContentType extends AbstractContainerContentType
{

    protected function loadContentType()
    {

        $this->typeLabel = 'Base Container';
        $this->typeId = '62723577-e1c3-4d90-8d92-d9689e58cb7d';
        $this->viewClassList[]  = ContainerContentView::class;
        $this->dataId = 'b4bfe3e8-6719-4b42-b384-986c9751953c';
        $this->deletable=false;

        $this->container = 'Explorer';
        $this->description = 'Base Container';


//        $this->restrictedChild = true;
//        $this->addRestrictedContentTypeCollectionClass(BaseContentTypeCollection::class);

    }

}