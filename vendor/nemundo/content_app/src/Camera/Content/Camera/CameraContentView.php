<?php

namespace Nemundo\Content\App\Camera\Content\Camera;

use Nemundo\Admin\Com\Table\AdminLabelValueTable;
use Nemundo\Content\View\AbstractContentView;
use Nemundo\Package\Bootstrap\Image\BootstrapResponsiveImage;

class CameraContentView extends AbstractContentView
{
    /**
     * @var CameraContentType
     */
    public $contentType;

    public function getContent()
    {


        $cameraRow=$this->contentType->getDataRow();

        $img= new BootstrapResponsiveImage($this);
        $img->src=$cameraRow->image->getUrl();
        $img->width = 300;

        $table=new AdminLabelValueTable($this);
        $table->addLabelValue('Camera',$cameraRow->camera);




        return parent::getContent();
    }
}