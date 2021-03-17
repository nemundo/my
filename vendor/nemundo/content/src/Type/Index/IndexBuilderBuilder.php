<?php

namespace Nemundo\Content\Type\Index;


use Nemundo\Content\Data\Content\Content;
use Nemundo\Content\Data\Content\ContentCount;

class IndexBuilderBuilder extends AbstractIndexBuilder
{

    public function buildIndex()
    {

        $count = new ContentCount();
        $count->filter->andEqual($count->model->contentTypeId, $this->contentType->typeId);
        $count->filter->andEqual($count->model->dataId, $this->contentType->getDataId());
        if ($count->getCount() == 0) {

            $data = new Content();
            $data->contentTypeId = $this->contentType->typeId;
            $data->dataId = $this->contentType->getDataId();
            $data->subject = $this->contentType->getSubject();
            $data->save();

        }

        return $this;

    }


    public function deleteIndex() {



    }


}