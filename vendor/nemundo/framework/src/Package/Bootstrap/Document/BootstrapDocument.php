<?php

namespace Nemundo\Package\Bootstrap\Document;

use Nemundo\Com\Container\LibraryTrait;
use Nemundo\Html\Document\HtmlDocument;
use Nemundo\Html\Header\Meta\Meta;
use Nemundo\Html\Script\JavaScript;
use Nemundo\Package\Bootstrap\Package\BootstrapPackage;
use Nemundo\Package\Jquery\Code\JqueryReadyCode;
use Nemundo\Package\Jquery\Package\JqueryPackage;

class BootstrapDocument extends HtmlDocument
{

    use LibraryTrait;

    /**
     * @var JqueryReadyCode
     */
    private $jquery;

    protected function loadContainer()
    {

        $this->addPackage(new JqueryPackage());
        $this->addPackage(new BootstrapPackage());

        $script = new JavaScript($this);
        LibraryTrait::$readyCode = new JqueryReadyCode($script);

        parent::loadContainer();
        $this->jquery = new JqueryReadyCode();

    }


    public function getContent()
    {

        $meta = new Meta($this);
        $meta->addAttribute('name', 'viewport');
        $meta->addAttribute('content', 'width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no');

        $script = new JavaScript($this);
        LibraryTrait::$readyCode = new JqueryReadyCode($script);

        return parent::getContent();

    }

}