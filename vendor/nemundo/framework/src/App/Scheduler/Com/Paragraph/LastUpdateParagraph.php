<?php


namespace Nemundo\App\Scheduler\Com\Paragraph;


use Nemundo\App\Scheduler\Check\LastUpdate;
use Nemundo\App\Scheduler\Data\SchedulerLog\SchedulerLogReader;
use Nemundo\App\Scheduler\Job\AbstractScheduler;
use Nemundo\App\Scheduler\Status\FinishedSchedulerStatus;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Html\Paragraph\Paragraph;

class LastUpdateParagraph extends Paragraph
{

    /**
     * @var AbstractScheduler
     */
    public $scheduler;


    public function getContent()
    {

        /*
        $dateTime = null;

        $logReader = new SchedulerLogReader();
        $logReader->model->loadScheduler();
        $logReader->model->scheduler->loadScript();
        $logReader->filter->andEqual($logReader->model->scheduler->script->scriptClass, $this->scheduler->getClassName());
        $logReader->filter->andEqual($logReader->model->schedulerStatusId, (new FinishedSchedulerStatus())->id);
        $logReader->addOrder($logReader->model->plannedDateTime, SortOrder::DESCENDING);
        $logReader->limit = 1;
        foreach ($logReader->getData() as $logRow) {
            $dateTime = $logRow->runningDateTime;
        }

        $text = 'No Update';
        if ($dateTime !== null) {
            $text = 'Last Update: ' . $dateTime->getShortDateTimeLeadingZeroFormat();
        }*/

        $this->content = (new LastUpdate($this->scheduler))->getLastUpdateText();

        return parent::getContent();

    }

}