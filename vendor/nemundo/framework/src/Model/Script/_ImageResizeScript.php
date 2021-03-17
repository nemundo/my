<?php


namespace Nemundo\Model\Script;


use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Content\App\Camera\Data\Camera\CameraModel;
use Nemundo\Model\Data\Property\Image\DataImageResize;
use Nemundo\Model\Reader\ModelDataReader;
use Nemundo\Model\Reader\Property\File\ImageReaderProperty;
use Nemundo\Model\Type\File\ImageType;

// move to application

class ImageResizeScript extends AbstractConsoleScript
{

    protected function loadScript()
    {
        $this->scriptName = 'model-image-resize';
    }


    public function run()
    {

        $model = new CameraModel();  //  new ImageModel();

        $reader = new ModelDataReader();
        $reader->model = $model;
        foreach ($reader->getData() as $dataRow) {

            foreach ($model->getTypeList() as $type) {

                if ($type->isObjectOfClass(ImageType::class)) {

                    $image = new ImageReaderProperty($dataRow, $type);
                    $filenameOrginal = $image->getFullFilename();

                    $resize = new DataImageResize();
                    $resize->type = $type;
                    $resize->resizeImage($filenameOrginal);


                    /*

                    $image = new ImageReaderProperty($dataRow,$type);

                    foreach ($type->getFormatList() as $format) {
                        //(new Debug())->write($format->getPath());

                        //$carousel->addImage($imageRow->image->getImageUrl($imageReader->model->imageAutoSize1600));

                        //(new Debug())->write($image->getImageFullFilename($format));



                        $filenameOrginal = $image->getFullFilename();

                        $filename = $image->getImageFullFilename($format);
                        $file=new File($filename);

                        if ($file->notExists()) {

                            (new Debug())->write($filenameOrginal);
                            (new Debug())->write($filename);

                        }



                    }*/


                }

            }


        }


    }

}