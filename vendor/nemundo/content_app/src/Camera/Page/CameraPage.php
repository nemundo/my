<?php

namespace Nemundo\Content\App\Camera\Page;

use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\App\Camera\Content\Camera\CameraContentType;
use Nemundo\Content\App\Camera\Data\Camera\CameraPaginationReader;
use Nemundo\Package\Bootstrap\Image\BootstrapResponsiveImage;
use Nemundo\Package\Bootstrap\Pagination\BootstrapPagination;

class CameraPage extends AbstractTemplateDocument
{
    public function getContent()
    {


        $type=new CameraContentType();
        $type->getDefaultForm($this);

        $cameraReader=new CameraPaginationReader();

        $table=new AdminTable($this);

        foreach ($cameraReader->getData() as $cameraRow) {

            $row=new TableRow($table);
            $row->addText($cameraRow->camera);

            $img= new BootstrapResponsiveImage($row);
            $img->src=$cameraRow->image->getUrl();
            $img->width = 300;

        }

        $pagination=new BootstrapPagination($this);
        $pagination->paginationReader=$cameraReader;


        return parent::getContent();
    }
}