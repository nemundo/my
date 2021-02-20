<?php

namespace Nemundo\Content\App\ImageGallery\Content\ImageGallery;

use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\Content\App\ImageGallery\Data\Image\ImageReader;
use Nemundo\Content\View\AbstractContentView;
use Nemundo\Package\Bootstrap\Carousel\BootstrapImageCarousel;

class ImageGalleryContentView extends AbstractContentView
{
    /**
     * @var ImageGalleryContentType
     */
    public $contentType;

    public function getContent()
    {

        $imageGalleryRow=$this->contentType->getDataRow();

        /*
        $subtitle=new AdminSubtitle($this);
        $subtitle->content=$imageGalleryRow->imageGallery;*/

        $carousel=new BootstrapImageCarousel($this);

        $imageReader=new ImageReader();
        $imageReader->filter->andEqual($imageReader->model->galleryId,$imageGalleryRow->id);
        $imageReader->addOrder($imageReader->model->id);
        foreach ($imageReader->getData() as $imageRow) {
            $carousel->addImage($imageRow->image->getImageUrl($imageReader->model->imageAutoSize1600));
        }

        return parent::getContent();
    }
}