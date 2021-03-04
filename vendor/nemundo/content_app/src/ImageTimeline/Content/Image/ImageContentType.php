<?php

namespace Nemundo\Content\App\ImageTimeline\Content\Image;

use Nemundo\Content\App\ImageTimeline\Data\Image\Image;
use Nemundo\Content\App\ImageTimeline\Data\Image\ImageDelete;
use Nemundo\Content\App\ImageTimeline\Data\Image\ImageReader;
use Nemundo\Content\App\ImageTimeline\Data\Image\ImageRow;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Core\Type\File\File;
use Nemundo\Model\Data\Property\File\FileProperty;

class ImageContentType extends AbstractContentType
{

    /**
     * @var FileProperty
     */
    public $image;

    public $hash;

    public $timelineId;

    protected function loadContentType()
    {
        $this->typeLabel = 'Image (Timeline)';
        $this->typeId = 'cc6ad885-4a31-47ec-baf6-89f7b6fc63b5';
        $this->formClassList[] = ImageContentForm::class;
        $this->viewClassList[] = ImageContentView::class;

        $this->image=new FileProperty();

    }

    protected function onCreate()
    {

        //$file = new File($filename);
        //$hash = $file->getHash();

        $data=new Image();
        $data->timelineId=$this->timelineId;
        $data->image->fromFileProperty($this->image);
        $data->hash=$this->hash;
        $this->dataId=$data->save();




    }

    protected function onUpdate()
    {
    }

    protected function onDelete()
    {
        (new ImageDelete())->deleteById($this->dataId);
    }

    protected function onIndex()
    {
    }

    protected function onDataRow()
    {
        $reader= new ImageReader();
        $reader->model->loadTimeline();
        $this->dataRow=$reader->getRowById($this->dataId);
    }

    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow|ImageRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }


    public function getSubject()
    {

        $imageRow=$this->getDataRow();

        //$subject=$imageRow->timeline->timeline

        $subject= $imageRow->dateTime->getShortDateTimeLeadingZeroFormat();
        return $subject;

    }


}