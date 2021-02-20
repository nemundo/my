<?php


namespace Nemundo\Content\App\File\Com\Form;


use Nemundo\Content\App\File\Job\UrlDownloadJob;
use Nemundo\Package\Bootstrap\Form\BootstrapForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;

class UrlDownloadForm extends BootstrapForm
{

    /**
     * @var BootstrapTextBox
     */
    private $url;

    public function getContent()
    {

        $this->url=new BootstrapTextBox($this);
        $this->url->label='Url';
        $this->url->validation=true;

        return parent::getContent(); // TODO: Change the autogenerated stub
    }


    protected function onSubmit()
    {


        $job=new UrlDownloadJob();
        $job->url = $this->url->getValue();
        $job->saveType();


    }

}