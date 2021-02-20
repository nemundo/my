<?php

namespace Nemundo\Html\Header\Link;


use Nemundo\Html\Container\AbstractHtmlContainer;

abstract class AbstractLink extends AbstractHtmlContainer
{

    /**
     * @var string
     */
    public $href;

    /**
     * @var string
     */
    public $media;

    /**
     * @var string
     */
    protected $rel;

    public function getContent()
    {

        $this->tagName = 'link';
        $this->renderClosingTag = false;
        $this->addAttribute('rel', $this->rel);
        $this->addAttribute('href', $this->href);
        $this->addAttribute('media', $this->media);

        return parent::getContent();

    }

}