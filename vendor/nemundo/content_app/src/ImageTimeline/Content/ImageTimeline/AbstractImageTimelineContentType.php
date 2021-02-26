<?php

namespace Nemundo\Content\App\ImageTimeline\Content\ImageTimeline;

use Nemundo\Content\App\ImageTimeline\Content\ImageTimeline\View\ImageTimelineLatestContentView;
use Nemundo\Content\App\ImageTimeline\Content\ImageTimeline\View\ImageTimelineRemoteContentView;
use Nemundo\Content\App\ImageTimeline\Content\ImageTimeline\View\ImageTimelineSliderContentView;
use Nemundo\Content\App\ImageTimeline\Data\ImageTimeline\ImageTimeline;
use Nemundo\Content\App\ImageTimeline\Data\ImageTimeline\ImageTimelineCount;
use Nemundo\Content\App\ImageTimeline\Data\ImageTimeline\ImageTimelineId;
use Nemundo\Content\App\ImageTimeline\Data\ImageTimeline\ImageTimelineReader;
use Nemundo\Content\App\ImageTimeline\Data\ImageTimeline\ImageTimelineRow;
use Nemundo\Content\App\ImageTimeline\Data\ImageTimeline\ImageTimelineUpdate;
use Nemundo\Content\Index\Tree\Com\Form\ContentSearchForm;
use Nemundo\Content\Type\AbstractContentType;

abstract class AbstractImageTimelineContentType extends AbstractContentType
{

    public $timeline;

    public $imageUrl;

    public $source;

    public $sourceUrl;

    // Intervall

    protected function loadContentType()
    {

        $this->typeLabel = 'Image Timeline';
        $this->typeId = '63e62295-48a6-41ae-b431-022682ea485c';
        $this->formClassList[] = ImageTimelineContentForm::class;
        $this->formClassList[] = ContentSearchForm::class;

        $this->viewClassList[] = ImageTimelineSliderContentView::class;

        $this->viewClassList[] = ImageTimelineLatestContentView::class;
        $this->viewClassList[] = ImageTimelineRemoteContentView::class;

    }

    protected function onCreate()
    {

        $data = new ImageTimeline();
        $data->timeline = $this->timeline;
        $data->imageUrl = $this->imageUrl;
        $data->source=$this->source;
        $data->sourceUrl=$this->sourceUrl;
        $this->dataId = $data->save();

    }

    protected function onUpdate()
    {

        $update = new ImageTimelineUpdate();
        $update->timeline = $this->timeline;
        $update->imageUrl = $this->imageUrl;
        $update->source=$this->source;
        $update->sourceUrl=$this->sourceUrl;
        $update->updateById($this->dataId);

    }

    protected function onDelete()
    {

        // image delete

    }

    protected function onIndex()
    {
    }

    protected function onDataRow()
    {
        $this->dataRow = (new ImageTimelineReader())->getRowById($this->dataId);
    }

    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow|ImageTimelineRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }


    public function getSubject()
    {
        return $this->getDataRow()->timeline;
    }




    public function existItem()
    {


        $value = parent::existItem();

        //$value = false;

        if (!$value) {

        $count = new ImageTimelineCount();
        $count->filter->andEqual($count->model->imageUrl, $this->imageUrl);
        if ($count->getCount() == 1) {
            $value = true;

            $id = new ImageTimelineId();
            $id->filter->andEqual($count->model->imageUrl, $this->imageUrl);
            $this->dataId = $id->getId();

        }

        }

        return $value;

    }


    public function downloadImage()
    {


    }


}