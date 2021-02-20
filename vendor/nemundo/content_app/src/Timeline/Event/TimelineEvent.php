<?php


namespace Nemundo\Content\App\Timeline\Event;


use Nemundo\Content\App\Timeline\Data\Timeline\Timeline;
use Nemundo\Content\App\Timeline\Index\TimelineIndexTrait;
use Nemundo\Content\Event\AbstractContentEvent;
use Nemundo\Content\Index\Calendar\DateTimeIndexTrait;
use Nemundo\Content\Type\AbstractType;
use Nemundo\Content\Type\ContentIndexTrait;

class TimelineEvent extends AbstractContentEvent
{

    //use TimelineIndexTrait;

    /**
     * @param AbstractType|ContentIndexTrait|DateTimeIndexTrait $contentType
     */
    public function onCreate(AbstractType $contentType)
    {

        $data=new Timeline();
        $data->ignoreIfExists=true;
        $data->contentId=$contentType->getContentId();
        $data->dateTime=$contentType->getDateTime();
        $data->date=$contentType->getDate();
        $data->subject=$contentType->getSubject();
        $data->save();



    }



    public function onUpdate(AbstractType $contentType)
    {
        $this->onCreate($contentType);

    }

}