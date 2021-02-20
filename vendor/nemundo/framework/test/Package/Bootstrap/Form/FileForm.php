<?php

require '../../config.php';

//require '../../vendor/autoload.php';


class TestForm extends \Nemundo\Package\Bootstrap\Form\BootstrapForm
{

    /**
     * @var \Nemundo\Package\Bootstrap\FormElement\BootstrapFileUpload
     */
  private $file;

    public function getHtml()
    {

        $this->file = new \Nemundo\Package\Bootstrap\FormElement\BootstrapFileUpload($this);
        $this->file->label = 'File';

        return parent::getContent();

    }


    protected function onSubmit()
    {


        $fileRequest = $this->file->getFileRequest();

        (new \Nemundo\Core\Debug\Debug())->write('Name: ' . $fileRequest->filename);



        exit;

    }


}


$html = new \Nemundo\Package\Bootstrap\Document\BootstrapDocument();

new \TestForm($html);

$html->render();

