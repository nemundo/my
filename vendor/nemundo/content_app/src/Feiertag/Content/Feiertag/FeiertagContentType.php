<?php

namespace Nemundo\Content\App\Feiertag\Content\Feiertag;

use Nemundo\Content\App\Calendar\Type\AbstractCalendarContentType;
use Nemundo\Content\App\Feiertag\Data\Feiertag\Feiertag;
use Nemundo\Content\App\Feiertag\Data\Feiertag\FeiertagCount;
use Nemundo\Content\App\Feiertag\Data\Feiertag\FeiertagDelete;
use Nemundo\Content\App\Feiertag\Data\Feiertag\FeiertagId;
use Nemundo\Content\App\Feiertag\Data\Feiertag\FeiertagReader;
use Nemundo\Content\App\Feiertag\Data\Feiertag\FeiertagRow;
use Nemundo\Core\Type\DateTime\Date;

class FeiertagContentType extends AbstractCalendarContentType
{

    /**
     * @var Date
     */
    public $datum;

    public $feiertag;


    protected function loadContentType()
    {
        $this->typeLabel = 'Feiertag';
        $this->typeId = 'b09b443a-a838-4af9-92d6-e2c48478dac8';
        $this->formClassList[] = FeiertagContentForm::class;
        $this->viewClassList[]  = FeiertagContentView::class;

        $this->datum=new Date();

    }


    protected function onCreate()
    {

        $data = new Feiertag();
        $data->datum = $this->datum;
        $data->feiertag = $this->feiertag;
        $this->dataId = $data->save();

    }


    protected function onUpdate()
    {
    }


    protected function onDelete()
    {
        $this->deleteCalendarIndex();
        (new FeiertagDelete())->deleteById($this->dataId);
    }


    protected function onDataRow()
    {
        $this->dataRow = (new FeiertagReader())->getRowById($this->dataId);
    }

    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow|FeiertagRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }


    public function existItem()
    {

        $value = false;

        $count = new FeiertagCount();
        $count->filter->andEqual($count->model->datum, $this->datum->getIsoDateFormat());
        if ($count->getCount() == 1) {

            $value = true;

            $id = new FeiertagId();
            $id->filter->andEqual($count->model->datum, $this->datum->getIsoDateFormat());
            $this->dataId = $id->getId();

        }

        return $value;

    }


    public function getSubject()
    {
        return $this->getDataRow()->feiertag;
    }


    public function getDate()
    {
        return $this->getDataRow()->datum;
    }


}