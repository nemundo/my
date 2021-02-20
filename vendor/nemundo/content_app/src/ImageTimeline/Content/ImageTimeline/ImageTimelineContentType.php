<?php

namespace Nemundo\Content\App\ImageTimeline\Content\ImageTimeline;

use Nemundo\Content\App\ImageTimeline\Content\ImageTimeline\View\ImageTimelineLatestContentView;
use Nemundo\Content\App\ImageTimeline\Content\ImageTimeline\View\ImageTimelineSliderContentView;
use Nemundo\Content\App\ImageTimeline\Data\ImageTimeline\ImageTimeline;
use Nemundo\Content\Type\AbstractContentType;

class ImageTimelineContentType extends AbstractContentType
{


    public $timeline;

    public $imageUrl;

    // Intervall

    protected function loadContentType()
    {
        $this->typeLabel = 'Image Timeline';
        $this->typeId = '63e62295-48a6-41ae-b431-022682ea485c';
        $this->formClassList[] = ImageTimelineContentForm::class;
        $this->viewClassList[] = ImageTimelineLatestContentView::class;
        $this->viewClassList[] = ImageTimelineSliderContentView::class;

    }

    protected function onCreate()
    {

        $data=new ImageTimeline();
        $data->timeline=$this->timeline;
        $data->imageUrl=$this->imageUrl;
        $this->dataId=$data->save();

    }

    protected function onUpdate()
    {
    }

    protected function onDelete()
    {
    }

    protected function onIndex()
    {
    }

    protected function onDataRow()
    {
    }

    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }




    public function downloadImage() {





    }



}