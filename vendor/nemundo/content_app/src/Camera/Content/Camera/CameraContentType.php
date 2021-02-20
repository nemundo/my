<?php

namespace Nemundo\Content\App\Camera\Content\Camera;

use Nemundo\Content\App\Camera\Data\Camera\Camera;
use Nemundo\Content\App\Camera\Data\Camera\CameraReader;
use Nemundo\Content\App\Camera\Data\Camera\CameraRow;
use Nemundo\Content\App\File\Type\ImageIndexTrait;
use Nemundo\Content\Index\Tree\Type\AbstractTreeContentType;
use Nemundo\Core\Http\Request\File\FileRequest;
use Nemundo\Core\Image\Exif\Exif;

class CameraContentType extends AbstractTreeContentType
{


    //use ImageIndexTrait;

    /**
     * @var FileRequest
     */
    public $image;


    protected function loadContentType()
    {
        $this->typeLabel = 'Camera';
        $this->typeId = 'd7ce44a9-7a62-4c88-9e48-7859df3de1b2';
        $this->formClassList[] = CameraContentForm::class;
        $this->viewClassList[]  = CameraContentView::class;
    }

    protected function onCreate()
    {

        $exif = new Exif($this->image->tmpFileName);

        $data = new Camera();
        $data->image->fromFileRequest($this->image);
        $data->camera = $exif->camera;
        $this->dataId = $data->save();


        // image index

    }

    protected function onUpdate()
    {
    }


    protected function onIndex()
    {

        // $this->saveImageIndex();

    }


    protected function onDataRow()
    {
        $this->dataRow = (new CameraReader())->getRowById($this->dataId);
    }

    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow|CameraRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }


    protected function getImageFilename()
    {
        return $this->getDataRow()->image->getFullFilename();
    }


}