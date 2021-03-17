<?php

namespace Nemundo\Content\App\ImageGallery\Content\ImageGallery;

use Nemundo\Content\App\ImageGallery\Content\ImageGallery\View\ImageGalleryContentView;
use Nemundo\Content\App\ImageGallery\Content\ImageGallery\View\ImageGalleryStreamContentView;
use Nemundo\Content\App\ImageGallery\Data\Image\Image;
use Nemundo\Content\App\ImageGallery\Data\ImageGallery\ImageGallery;
use Nemundo\Content\App\ImageGallery\Data\ImageGallery\ImageGalleryReader;
use Nemundo\Content\App\ImageGallery\Data\ImageGallery\ImageGalleryRow;
use Nemundo\Content\App\ImageGallery\Data\ImageGallery\ImageGalleryUpdate;
use Nemundo\Content\Index\Tree\Com\Form\ContentSearchForm;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Content\View\Listing\ContentListing;
use Nemundo\Model\Data\Property\File\FileProperty;

class ImageGalleryContentType extends AbstractContentType
{

    public $imageGallery;

    protected function loadContentType()
    {
        $this->typeLabel = 'Image Gallery';
        $this->typeId = 'ab8b256d-332b-42a9-8be0-78bdd21ace32';

        $this->formClassList[] = ImageGalleryContentForm::class;
        $this->formClassList[] = ContentSearchForm::class;
        $this->viewClassList[] = ImageGalleryContentView::class;
        $this->viewClassList[]=ImageGalleryStreamContentView::class;
        $this->listingClass = ContentListing::class;
    }

    protected function onCreate()
    {

        $data = new ImageGallery();
        $data->imageGallery = $this->imageGallery;
        $this->dataId = $data->save();

    }

    protected function onUpdate()
    {

        $update = new ImageGalleryUpdate();
        $update->imageGallery = $this->imageGallery;
        $update->updateById($this->dataId);

    }

    protected function onDataRow()
    {
        $this->dataRow = (new ImageGalleryReader())->getRowById($this->dataId);
    }


    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow|ImageGalleryRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }


    public function getSubject()
    {
        return $this->getDataRow()->imageGallery;
    }


    public function addImage(FileProperty $fileProperty)
    {

        $data = new Image();
        $data->galleryId = $this->getDataId();
        $data->image->fromFileProperty($fileProperty);
        $data->save();

    }


}