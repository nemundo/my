<?php

namespace Nemundo\Content\App\ImageTimeline\Content\Bielen;

use Nemundo\Content\App\ImageTimeline\Content\ImageTimeline\AbstractImageTimelineContentType;
use Nemundo\Content\Type\AbstractContentType;

class EumetsatContentType extends  AbstractImageTimelineContentType
{

    protected function loadContentType()
    {

        parent::loadContentType();

        //$this->typeLabel = 'Eumetsat';
        //$this->typeId = '14b9384a-a934-420d-9754-40de9d8ed201';

        $this->imageUrl = 'https://eumetview.eumetsat.int/static-images/latestImages/EUMETSAT_MSG_H03B_WesternEurope.png';
        $this->timeline = 'Eumetsat';


    }


}