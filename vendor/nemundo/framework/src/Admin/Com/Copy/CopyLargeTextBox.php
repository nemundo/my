<?php

namespace Nemundo\Admin\Com\Copy;


use Nemundo\Admin\Com\Button\AdminCopyButton;
use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Package\Bootstrap\FormElement\BootstrapLargeTextBox;

// Bootstrap
class CopyLargeTextBox extends BootstrapLargeTextBox  // AbstractHtmlContainer
{



    //private $largeText;

    public function getContent()
    {

        //$this->largeText=new BootstrapLargeTextBox($this);


        $btn=new AdminCopyButton();
        $btn->copyId=$this->name;

        $this->addContainer($btn);


        return parent::getContent(); // TODO: Change the autogenerated stub
    }





}