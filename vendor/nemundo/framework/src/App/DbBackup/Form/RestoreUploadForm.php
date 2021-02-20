<?php

namespace Nemundo\App\DbBackup\Form;


use Nemundo\Admin\Com\Form\AbstractAdminForm;
use Nemundo\App\DbBackup\Path\UploadRestoreFilename;
use Nemundo\App\DbBackup\Path\UploadRestorePath;
use Nemundo\Core\Archive\ZipExtractor;
use Nemundo\Core\Debug\Debug;
use Nemundo\Db\Provider\MySql\Dump\MySqlDumpRestore;
use Nemundo\Html\Form\Input\AcceptFileType;
use Nemundo\Package\Bootstrap\FormElement\BootstrapFileUpload;

class RestoreUploadForm extends AbstractAdminForm
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

        (new UploadRestorePath())->createPath();

        $fileRequest = $this->file->getFileRequest();
        $filename = $fileRequest->saveAsOrginalFilename((new UploadRestorePath())->getPath());

        (new Debug())->write($filename);


        $zip = new ZipExtractor();
        $zip->archiveFilename = $filename;  // (new UploadRestoreFilename())->getFilename();  // $zipFilename;
        $zip->extractPath = (new UploadRestorePath())->getPath();
        $zip->extract();

        $dump = new MySqlDumpRestore();
        $dump->filename = (new UploadRestorePath())->addPath('dump_2020_07_28.sql')->getFilename();
        $dump->restoreDumpFile();


        exit;

    }

}