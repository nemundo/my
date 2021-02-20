<?php


namespace Nemundo\Html\Header\Meta;


class DescriptionMeta extends AbstractMeta
{

    public $description;

    public function getContent()
    {

        $this->addAttribute('name', 'description');
        $this->addAttribute('content', $this->description);

        return parent::getContent();

    }

}