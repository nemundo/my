<?php


namespace Nemundo\Content\App\File\Content\Image;


use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Content\App\File\Data\Image\ImagePaginationReader;
use Nemundo\Content\Com\Dropdown\ContentActionDropdown;
use Nemundo\Content\View\AbstractContentListing;
use Nemundo\Package\Bootstrap\Image\BootstrapResponsiveImage;

class ImageContentListing extends AbstractContentListing
{

    public function getContent()
    {

        $table = new AdminTable($this);

        $reader = new ImagePaginationReader();

        $header = new AdminTableHeader($table);
        $header->addText('Image');
        $header->addText($reader->model->fileSize->label);
        $header->addEmpty();

        foreach ($reader->getData() as $imageRow) {


            $row = new TableRow($table);

            $img = new BootstrapResponsiveImage($row);
            $img->src = $imageRow->image->getImageUrl($reader->model->imageAutoSize400);

            $row->addText($imageRow->fileSize);


            $imageContentType = new ImageContentType($imageRow->id);

            $dropdown = new ContentActionDropdown($row);
            $dropdown->contentId = $imageContentType->getContentId();
            $dropdown->addDefaultAction();


        }


        return parent::getContent(); // TODO: Change the autogenerated stub
    }


}