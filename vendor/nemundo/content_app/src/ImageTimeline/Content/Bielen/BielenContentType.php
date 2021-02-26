<?php

namespace Nemundo\Content\App\ImageTimeline\Content\Bielen;

use Nemundo\Content\App\ImageTimeline\Content\ImageTimeline\AbstractImageTimelineContentType;
use Nemundo\Content\Type\AbstractContentType;

class BielenContentType extends  AbstractImageTimelineContentType
{

    protected function loadContentType()
    {

        parent::loadContentType();

        //$this->typeLabel = 'Bielen';
        //$this->typeId = '94bf9f0d-9a71-46a5-8dcf-ec441b091a45';

        $this->imageUrl = 'https://bielenbahn.ch/images/webcam/livebild.jpg';
        $this->timeline = 'Bielen';


    }


}