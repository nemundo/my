<?php


namespace Nemundo\App\DbBackup\Path;


use Nemundo\Project\Path\TmpPath;

class UploadRestorePath extends TmpPath
{

    public function __construct()
    {
        parent::__construct();
        $this->addPath('db_restore_upload');
    }

}