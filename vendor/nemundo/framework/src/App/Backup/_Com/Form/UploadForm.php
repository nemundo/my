<?php

namespace Nemundo\App\Backup\Com\Form;


use Nemundo\Admin\Com\Form\AbstractAdminForm;
use Nemundo\App\Backup\Path\RestoreBackupPath;
use Nemundo\App\DbBackup\Path\UploadRestoreFilename;
use Nemundo\App\DbBackup\Path\UploadRestorePath;
use Nemundo\Core\Archive\ZipExtractor;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Type\File\File;
use Nemundo\Db\Provider\MySql\Dump\MySqlDumpRestore;
use Nemundo\Html\Form\Input\AcceptFileType;
use Nemundo\Package\Bootstrap\FormElement\BootstrapFileUpload;

class UploadForm extends AbstractAdminForm
{

    /**
     * @var BootstrapFileUpload
     */
    private $file;

    public function getContent()
    {

        $this->file = new BootstrapFileUpload($this);
        $this->file->label = 'Zip File';
        $this->file->acceptFileType = AcceptFileType::ZIP;

        $this->submitButton->label = 'Upload';

        return parent::getContent();
    }


    protected function onSubmit()
    {

        (new RestoreBackupPath())->createPath();

        $fileRequest = $this->file->getFileRequest();
        $filename = $fileRequest->saveAsOrginalFilename((new RestoreBackupPath())->getPath());


        //(new Debug())->write($filename);


        $zip = new ZipExtractor();
        $zip->archiveFilename = $filename;  // (new UploadRestoreFilename())->getFilename();  // $zipFilename;
        $zip->extractPath = (new RestoreBackupPath())->getPath();
        $zip->extract();

        (new File($filename))->deleteFile();


        /*$dump = new MySqlDumpRestore();
        $dump->filename = (new RestorePath())->addPath('dump.sql')->getFilename();
        $dump->restoreDumpFile();*/


        //(new Debug())->write('php bin/cmd.php backup-restore');

        //exit;

    }

}