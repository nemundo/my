<?php

namespace Nemundo\Content\App\File\Com\Form;


use Nemundo\Content\App\File\Site\FileSaveSite;
use Nemundo\Package\Dropzone\DropzoneUploadForm;

class FileContentDropzoneUploadForm extends DropzoneUploadForm
{

    public function getContent()
    {

        $this->saveSite = FileSaveSite::$site;
        return parent::getContent();

    }

}