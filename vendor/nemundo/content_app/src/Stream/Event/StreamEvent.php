<?php


namespace Nemundo\Content\App\Stream\Event;


use Nemundo\Content\App\Stream\Data\Stream\Stream;
use Nemundo\Content\Event\AbstractContentEvent;
use Nemundo\Content\Type\AbstractType;

class StreamEvent extends AbstractContentEvent
{

    public function onCreate(AbstractType $contentType)
    {


        $data=new Stream();
        $data->contentId= $contentType->getContentId();  //actionContentId;
        $data->hasMessage=false;
        $data->active=true;
        $data->contentViewId=$contentType->getDefaultViewId();
        $data->save();
    }

}