<?php

namespace Nemundo\Content\App\Map\Content\Route;

use Nemundo\Content\Form\AbstractContentForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapFileUpload;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;

class RouteContentForm extends AbstractContentForm
{
    /**
     * @var RouteContentType
     */
    public $contentType;

    /**
     * @var BootstrapTextBox
     */
    private $route;

    /**
     * @var BootstrapFileUpload
     */
    private $file;


    public function getContent()
    {

        $this->route = new BootstrapTextBox($this);
        $this->route->label = 'Route';
        $this->route->validation = true;

        $this->file = new BootstrapFileUpload($this);
        $this->file->label = 'File';
        $this->file->acceptFileType = '.gpx';
        $this->file->validation = true;

        return parent::getContent();

    }

    public function onSubmit()
    {

        $this->contentType->route = $this->route->getValue();
        $this->contentType->file->fromFileRequest($this->file->getFileRequest());
        $this->contentType->saveType();

    }
}