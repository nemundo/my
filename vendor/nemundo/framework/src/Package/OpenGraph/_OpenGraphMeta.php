<?php

namespace Nemundo\Package\OpenGraph;


use Nemundo\Html\Header\Meta\AbstractMeta;
use Nemundo\Html\Header\Meta\Meta;

class OpenGraphMeta extends AbstractMeta
{

    /**
     * @var string
     */
    public $property;

    /**
     * @var string
     */
    public $content;


    public function getContent()
    {

        $this->addAttribute('property', 'og:'.$this->property);
        $this->addAttribute('content', $this->content);

        return parent::getContent();

    }

}