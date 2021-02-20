<?php

namespace Nemundo\Package\Bootstrap\Dropdown;

use Nemundo\Com\Html\Hyperlink\UrlHyperlink;
use Nemundo\Html\Block\Div;
use Nemundo\Html\Button\Button;

class BootstrapDropdown extends Div
{

    /**
     * @var string
     */
    public $label;

    /**
     * @var Button
     */
    private $dropdownButton;

    /**
     * @var Div
     */
    protected $dropdownDiv;


    protected function loadContainer()
    {

/*
        <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
        Dropdown button
    </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <li><a class="dropdown-item" href="#">Action</a></li>
    <li><a class="dropdown-item" href="#">Another action</a></li>
    <li><a class="dropdown-item" href="#">Something else here</a></li>
  </ul>
</div>
   */

        parent::loadContainer();

        $this->addCssClass('dropdown');

        $this->dropdownButton = new Button($this);
        $this->dropdownButton->id = 'dropdownMenuButton';
        $this->dropdownButton->addAttribute('data-bs-toggle', 'dropdown');
        $this->dropdownButton->addAttribute('aria-haspopup', 'true');
        $this->dropdownButton->addAttribute('aria-expanded', 'false');
        $this->dropdownButton->addCssClass('btn btn-primary dropdown-toggle');

        $this->dropdownDiv = new Div($this);
        $this->dropdownDiv->addAttribute('aria-labelledby', 'dropdownMenuButton');
        $this->dropdownDiv->addCssClass('dropdown-menu');

    }


    public function addItem($label, $url)
    {

        $hyperlink = new UrlHyperlink($this->dropdownDiv);
        $hyperlink->addCssClass('dropdown-item');
        $hyperlink->content = $label;
        $hyperlink->url = $url;

        return $this;

    }


    public function addSeperator()
    {
        $div = new Div($this->dropdownDiv);
        $div->addCssClass('dropdown-divider');
    }


    public function getContent()
    {
        $this->dropdownButton->label = $this->label;
        return parent::getContent();
    }

}