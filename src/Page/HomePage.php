<?php

namespace My\Page;

use My\Template\MyTemplate;
use Nemundo\App\UserAction\Widget\LoginWidget;
use Nemundo\Html\Heading\H2;

class HomePage extends MyTemplate
{
    public function getContent()
    {

        $h2 = new H2($this);
        $h2->content = 'Hello World';


       //$login= new LoginWidget($this);

        return parent::getContent();
    }
}