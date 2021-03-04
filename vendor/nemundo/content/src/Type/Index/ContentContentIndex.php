<?php

namespace Nemundo\Content\Type\Index;


use Nemundo\Content\Data\Content\Content;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Paragliding\Flyland\Content\Startplatz\StartplatzContentType;

class ContentContentIndex extends AbstractContentIndex
{




    public function buildIndex()
    {

        $data = new Content();
        $data->contentTypeId = $this->contentType->typeId;   // (new StartplatzContentType())->typeId;  //  $this->typeId;
        $data->dataId = $this->contentType->getDataId();  // $dataId;  // $this->getDataId();
        $data->subject = $this->contentType->getSubject();
        $data->save();

        return $this;

        // TODO: Implement buildIndex() method.
    }


}