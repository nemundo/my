<?php


namespace Nemundo\Content\App\Calendar\Type;


use Nemundo\Content\App\Calendar\Data\CalendarIndex\CalendarIndex;
use Nemundo\Content\App\Calendar\Data\CalendarIndex\CalendarIndexDelete;
use Nemundo\Core\Type\DateTime\Date;



// CalendarGroupIndexTrait
trait CalendarIndexTrait
{


    public $date;

    public $title;

    public $groupId;


    /**
     * @return Date
     */
    abstract protected function getDate();


    protected function saveCalendarIndex()
    {

        $data = new CalendarIndex();
        $data->updateOnDuplicate = true;
        $data->contentId = $this->getContentId();
        $data->groupId=$this->groupId;
        $data->date = $this->getDate();
        $data->title = $this->getSubject();  //getTitle();
        $data->save();

    }


    protected function deleteCalendarIndex()
    {

        $delete= new CalendarIndexDelete();
        $delete->filter->andEqual($delete->model->contentId,$this->getContentId());
        $delete->delete();

    }


}