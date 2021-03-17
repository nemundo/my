<?php

namespace Nemundo\Content\App\ImageTimeline\Scheduler;

use Nemundo\App\Scheduler\Job\AbstractScheduler;
use Nemundo\Content\App\ImageTimeline\Content\Image\ImageContentImport;
use Nemundo\Content\App\ImageTimeline\Content\Image\ImageContentType;
use Nemundo\Content\App\ImageTimeline\Data\Image\ImageCount;
use Nemundo\Content\App\ImageTimeline\Data\ImageTimeline\ImageTimelineReader;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\File\UniqueFilename;
use Nemundo\Core\Type\File\File;
use Nemundo\Core\WebRequest\WebRequest;
use Nemundo\Project\Path\TmpPath;

class ImageTimelineScheduler extends AbstractScheduler
{
    protected function loadScheduler()
    {

        $this->active = true;
        $this->minute = 5;


        $this->consoleScript = true;
        $this->scriptName = 'timeline-image';

    }

    public function run()
    {

        $reader = new ImageTimelineReader();
        $reader->filter->andEqual($reader->model->crawling,true);
        foreach ($reader->getData() as $timelineRow) {


            //(new Debug())->write($timelineRow->imageUrl);


            $import = new ImageContentImport();  //Type();
            $import->timelineId =$timelineRow->id;
            $import->imageUrl = $timelineRow->imageUrl;
            //$import->dateTime = $item->dateTime;
            $import->importContent();  //saveType();





            /*
            $filename = (new TmpPath())
                ->addPath((new UniqueFilename())->getUniqueFilename('jpg'))
                ->getFilename();

            $download = new WebRequest();
            $download->downloadUrl($timelineRow->imageUrl, $filename);

            $file = new File($filename);
            $hash = $file->getHash();

            $count = new ImageCount();
            $count->filter->andEqual($count->model->hash, $hash);
            if ($count->getCount() == 0) {

                $type = new ImageContentType();
                $type->timelineId = $timelineRow->id;
                $type->image->fromFilename($filename);
                $type->hash = $hash;
                $type->saveType();






            }

            $file->deleteFile();*/


        }


    }
}