<?php


namespace Nemundo\App\DbBackup\Path;


class UploadRestoreFilename extends UploadRestorePath
{

    public function __construct()
    {
        parent::__construct();
        $this->addPath('backup.zip');
    }

}