<?php

namespace Nemundo\Content\App\ImageTimeline\Content\Image;


use Nemundo\Content\App\ImageTimeline\Data\Image\Image;
use Nemundo\Content\App\ImageTimeline\Data\Image\ImageCount;
use Nemundo\Content\App\ImageTimeline\Data\Image\ImageDelete;
use Nemundo\Content\App\ImageTimeline\Data\Image\ImageId;
use Nemundo\Content\App\ImageTimeline\Data\Image\ImageReader;
use Nemundo\Content\App\ImageTimeline\Data\Image\ImageRow;
use Nemundo\Content\Type\Index\IndexBuilderBuilder;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\File\UniqueFilename;
use Nemundo\Core\Http\Response\StatusCode;
use Nemundo\Core\Type\DateTime\DateTime;
use Nemundo\Core\Type\File\File;
use Nemundo\Core\WebRequest\WebRequest;
use Nemundo\Model\Data\Property\File\FileProperty;
use Nemundo\Project\Path\TmpPath;

class ImageContentImport extends AbstractBase
{


    /**
     * @var FileProperty
     */
    //public $image;

    /**
     * @var DateTime
     */
    public $dateTime;

    //public $hash;

    public $timelineId;


    public $imageUrl;

    //private $tmpFilename;

    //private $tmpHash;



    public function __construct() {


        $this->dateTime = (new DateTime())->setNow();
    }


    public function importContent()
    {


        $filename = (new TmpPath())
            ->addPath((new UniqueFilename())->getUniqueFilename('jpg'))
            ->getFilename();

        $download = new WebRequest();
        $download->downloadUrl($this->imageUrl, $filename);

        $file = new File($filename);
        $hash = $file->getHash();

        $count = new ImageCount();
        $count->filter->andEqual($count->model->timelineId, $this->timelineId);
        $count->filter->andEqual($count->model->hash, $hash);
        if ($count->getCount() ==0) {
            //$value = true;

            $data = new Image();
            $data->timelineId = $this->timelineId;
            $data->image->fromFilename($filename); //fromFileProperty($this->image);
            $data->hash = $hash;
            $data->dateTime = $this->dateTime;
            $dataId = $data->save();

            $contentType = new ImageContentType($dataId);

            (new IndexBuilderBuilder($contentType))->buildIndex();


        }


        $file->deleteFile();

    }


/*
            $data = new Image();
            $data->timelineId = $this->timelineId;
            $data->image->fromFilename($this->tmpFilename); //fromFileProperty($this->image);
            $data->hash = $this->tmpHash;
            $data->dateTime = $this->dateTime;
            $this->dataId = $data->save();

            // }


            (new File($this->tmpFilename))->deleteFile();

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
      /*  public function getDataRow()
        {
            return parent::getDataRow();
        }


        public function getSubject()
        {

            $imageRow = $this->getDataRow();

            $subject = $imageRow->dateTime->getShortDateTimeLeadingZeroFormat();
            return $subject;

        }


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

        }




    }*/



}