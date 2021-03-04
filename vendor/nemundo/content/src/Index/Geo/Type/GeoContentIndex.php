<?php

namespace Nemundo\Content\Index\Geo\Type;


use Nemundo\Content\Index\Geo\Data\GeoIndex\GeoIndex;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Content\Type\Index\AbstractContentIndex;

class GeoContentIndex extends AbstractContentIndex
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

}