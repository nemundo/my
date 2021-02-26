<?php

namespace Nemundo\Content\App\ImageTimeline\Scheduler;

use Nemundo\App\Scheduler\Job\AbstractScheduler;
use Nemundo\Content\App\ImageTimeline\Application\ImageTimelineApplication;
use Nemundo\Content\App\ImageTimeline\Content\Image\ImageContentType;
use Nemundo\Content\App\ImageTimeline\Data\Image\ImageCount;
use Nemundo\Content\App\ImageTimeline\Data\ImageTimeline\ImageTimelineReader;
use Nemundo\Content\App\Webcam\Data\WebcamImage\WebcamImage;
use Nemundo\Content\App\Webcam\Data\WebcamImage\WebcamImageCount;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\File\UniqueFilename;
use Nemundo\Core\Type\File\File;
use Nemundo\Core\WebRequest\WebRequest;
use Nemundo\Project\Path\TmpPath;

class ImageTimelineScheduler extends AbstractScheduler
{
    protected function loadScheduler()
    {

        $this->active=true;
        $this->minute = 5;


        $this->consoleScript=true;
        $this->scriptName='timeline-image';

    }

    public function run()
    {


        //(new ImageTimelineApplication())->installApp();



        $reader=new ImageTimelineReader();
        foreach ($reader->getData() as $timelineRow) {

            //(new Debug())->write($timelineRow->timeline);



            $filename = (new TmpPath())
                ->addPath((new UniqueFilename())->getUniqueFilename('jpg'))
                ->getFilename();

            $download = new WebRequest();
            $download->downloadUrl($timelineRow->imageUrl, $filename);

            $file = new File($filename);
            $hash = $file->getHash();

            $count = new ImageCount();  // new WebcamImageCount();
            $count->filter->andEqual($count->model->hash, $hash);
            if ($count->getCount() == 0) {

                /*
                $data = new WebcamImage();
                $data->webcamId=$timelineRow->id;
                $data->image->fromFilename($filename);
                $data->hash = $hash;
                $data->save();*/

                $type=new ImageContentType();
                $type->timelineId=$timelineRow->id;
                $type->image->fromFilename($filename);
                $type->hash=$hash;
                $type->saveType();


            }

            $file->deleteFile();





        }



    }
}