<?php


namespace Nemundo\App\DbBackup\Page;


use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\Admin\Template\AdminTemplate;
use Nemundo\App\DbBackup\Form\RestoreUploadForm;
use Nemundo\App\DbBackup\Install\DbBackupInstall;
use Nemundo\App\DbBackup\Site\DownloadSite;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Package\Bootstrap\Form\BootstrapForm;



class DbBackupPage extends AbstractTemplateDocument
{

    public function getContent()
    {

        $btn = new AdminSiteButton($this);
        $btn->site = DownloadSite::$site;


       new RestoreUploadForm($this);

        //$form = new RestoreUploadForm($this);


        return parent::getContent();
    }

}