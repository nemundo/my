<?php


namespace Nemundo\Content\Type;

use Nemundo\Content\Event\AbstractContentEvent;

trait EventTrait
{

    /**
     * @var AbstractContentEvent[]
     */
    protected $eventList = [];

    public function addEvent(AbstractContentEvent $contentEvent)
    {

        $this->eventList[] = $contentEvent;
        return $this;

    }


    public function getEventList()
    {
        return $this->eventList;
    }


    protected function runEvent() {

        foreach ($this->eventList as $event) {

            $event->onCreate($this);

            /*
            if (!$this->existsItem) {
                $event->onCreate($this);
            } else {
                $event->onUpdate($this);
            }*/
        }

    }



}