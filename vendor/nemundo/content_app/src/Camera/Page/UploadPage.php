<?php

namespace Nemundo\Content\App\Camera\Page;

use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\App\Camera\Site\ImageSaveSite;
use Nemundo\Content\App\Camera\Site\ZipDownloadSite;
use Nemundo\Content\App\Camera\Template\CameraTemplate;
use Nemundo\Package\Bootstrap\Layout\Container\BootstrapContainer;
use Nemundo\Package\Dropzone\DropzoneUploadForm;

class UploadPage extends AbstractTemplateDocument // CameraTemplate
{
    public function getContent()
    {

        $form=new DropzoneUploadForm($this);
        $form->saveSite= ImageSaveSite::$site;


        $container = new BootstrapContainer($this);

        $btn=new AdminSiteButton($container);
        $btn->site=ZipDownloadSite::$site;


        return parent::getContent();
    }
}