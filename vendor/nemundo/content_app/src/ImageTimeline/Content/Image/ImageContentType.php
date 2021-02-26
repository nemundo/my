<?php

namespace Nemundo\Content\App\ImageTimeline\Content\Image;

use Nemundo\Content\App\ImageTimeline\Data\Image\Image;
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
}