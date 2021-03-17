<?php

namespace Nemundo\Content\Index\Geo\Index;


use Nemundo\Content\Index\Geo\Data\GeoIndex\GeoIndex;
use Nemundo\Content\Index\Geo\Data\GeoIndex\GeoIndexDelete;
use Nemundo\Content\Index\Geo\Type\GeoIndexTrait;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Content\Type\Index\AbstractIndexBuilder;


class GeoIndexBuilder extends AbstractIndexBuilder
{

    /**
     * @var GeoIndexTrait|AbstractContentType
     */
    protected $contentType;

    public function buildIndex()
    {

        $data = new GeoIndex();
        $data->updateOnDuplicate = true;
        $data->place = $this->contentType->getSubject();  // $this->getPlace();
        $data->coordinate =  $this->contentType->getCoordinate();  // $coordinate;
        $data->contentId = $this->contentType->getContentId();  // fromDataId($dataId)->getContentId();
        $data->save();

        return $this;

        // TODO: Implement buildIndex() method.
    }


    public function deleteIndex()
    {

        $delete = new GeoIndexDelete();
        $delete->filter->andEqual($delete->model->contentId, $this->contentType->getContentId());
        $delete->delete();

        // TODO: Implement deleteIndex() method.
    }


}