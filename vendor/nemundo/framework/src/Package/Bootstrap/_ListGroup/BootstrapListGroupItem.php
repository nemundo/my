<?php

namespace Nemundo\Package\Bootstrap\ListGroup;


use Nemundo\Html\Container\AbstractHtmlContainer;

class BootstrapListGroupItem extends AbstractHtmlContainer
{

    /**
     * @var string
     */
    public $title;

    /**
     * @var
     */
    public $subTitle;

    /**
     * @var string
     */
    public $text;

    /**
     * @var string
     */
    public $smallText;

    /**
     * @var string
     */
    public $url;


    public function getContent()
    {

        $this->addContent('<a href="' . $this->url . '" class="mt-2 list-group-item list-group-item-action flex-column align-items-start">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">' . $this->title . '</h5>
     <small class="text-muted">' . $this->subTitle . '</small>
    </div>
    <p class="mb-1">' . $this->text . '</p>');

        if ($this->smallText !== null) {
            $this->addContent('<small class="text-muted">' . $this->smallText . '</small>');
        }

        $this->addContent('</a>');


        return parent::getContent();
    }


}