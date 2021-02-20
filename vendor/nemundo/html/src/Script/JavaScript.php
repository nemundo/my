<?php

namespace Nemundo\Html\Script;


use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Html\Header\AbstractHeaderHtmlContainer;


class JavaScript extends AbstractHeaderHtmlContainer // AbstractHtmlContainer
{

    /**
     * @var string
     */
    public $src;



    // addLine
    // addHtml
    public function addCodeLine($line)
    {
        $this->addContent($line);
        return $this;
    }


    public function getContent()
    {

        $this->tagName = 'script';
        $this->addAttribute('type', 'text/javascript');
        $this->addAttribute('src', $this->src);

        return parent::getContent();

    }

}