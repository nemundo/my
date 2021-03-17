<?php

namespace Nemundo\Content\App\ImageTimeline\Content\Image;

use Nemundo\Content\App\ImageTimeline\Data\Image\Image;
use Nemundo\Content\App\ImageTimeline\Data\Image\ImageCount;
use Nemundo\Content\App\ImageTimeline\Data\Image\ImageDelete;
use Nemundo\Content\App\ImageTimeline\Data\Image\ImageId;
use Nemundo\Content\App\ImageTimeline\Data\Image\ImageReader;
use Nemundo\Content\App\ImageTimeline\Data\Image\ImageRow;
use Nemundo\Content\Index\Tree\Com\Form\ContentSearchForm;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Core\File\UniqueFilename;
use Nemundo\Core\Http\Response\StatusCode;
use Nemundo\Core\Type\DateTime\DateTime;
use Nemundo\Core\Type\File\File;
use Nemundo\Core\WebRequest\WebRequest;
use Nemundo\Model\Data\Property\File\FileProperty;
use Nemundo\Project\Path\TmpPath;

class ImageContentType extends AbstractContentType
{

    /**
     * @var FileProperty
     */
    //public $image;

    /**
     * @var DateTime
     */
    //public $dateTime;

    //public $hash;

    //public $timelineId;


    //public $imageUrl;

    //private $tmpFilename;

    //private $tmpHash;

    protected function loadContentType()
    {
        $this->typeLabel = 'Image (Timeline)';
        $this->typeId = 'cc6ad885-4a31-47ec-baf6-89f7b6fc63b5';
        //$this->formClassList[] = ImageContentForm::class;
        $this->formClassList[] = ContentSearchForm::class;
        $this->viewClassList[] = ImageContentView::class;

        //$this->image=new FileProperty();
        //$this->dateTime = new DateTime();

    }

    protected function onCreate()
    {


        /*$filename = (new TmpPath())
            ->addPath((new UniqueFilename())->getUniqueFilename('jpg'))
            ->getFilename();

        $download = new WebRequest();
        $download->downloadUrl($this->imageUrl, $filename);

        $file = new File($filename);
        $hash = $file->getHash();

        $count = new ImageCount();
        $count->filter->andEqual($count->model->hash, $hash);
        if ($count->getCount() == 0) {*/

        /*$type = new ImageContentType();
        $type->timelineId = $this->timelineId;
        $type->image->fromFilename($filename);
        $type->hash = $hash;
        $type->saveType();*/

       /* $data = new Image();
        $data->timelineId = $this->timelineId;
        $data->image->fromFilename($this->tmpFilename); //fromFileProperty($this->image);
        $data->hash = $this->tmpHash;
        $data->dateTime = $this->dateTime;
        $this->dataId = $data->save();*/

        // }


      //  (new File($this->tmpFilename))->deleteFile();

//        (new \Nemundo\Content\App\File\Data\File\File())
        //$file = new File($filename);

        //$file->deleteFile();


        //$file = new File($filename);
        //$hash = $file->getHash();


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

        //$this->sav

    }

    protected function onDataRow()
    {
        $reader = new ImageReader();
        $reader->model->loadTimeline();
        $this->dataRow = $reader->getRowById($this->dataId);
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

        $imageRow = $this->getDataRow();

        $subject = $imageRow->dateTime->getShortDateTimeLeadingZeroFormat();
        return $subject;

    }



    /*
    public function existItem()
    {

        $value = false;

        if ((new WebRequest())->getResponseCode($this->imageUrl) == StatusCode::OK) {

            $this->tmpFilename = (new TmpPath())
                ->addPath((new UniqueFilename())->getUniqueFilename('jpg'))
                ->getFilename();

            $download = new WebRequest();
            $download->downloadUrl($this->imageUrl, $this->tmpFilename);

            $file = new File($this->tmpFilename);
            $this->tmpHash = $file->getHash();

            $count = new ImageCount();
            $count->filter->andEqual($count->model->timelineId, $this->timelineId);
            $count->filter->andEqual($count->model->hash, $this->tmpHash);
            if ($count->getCount() == 1) {
                $value = true;

                $id = new ImageId();
                $id->filter->andEqual($count->model->timelineId, $this->timelineId);
                $id->filter->andEqual($count->model->hash, $this->tmpHash);
                $this->dataId = $id->getId();

                $file->deleteFile();

            }

        }

        return $value;

    }*/


}