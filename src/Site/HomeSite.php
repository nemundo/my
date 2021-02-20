<?php

namespace My\Site;

use My\Page\HomePage;
use Nemundo\Web\Site\AbstractSite;

class HomeSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'Home';
        $this->url = '';
    }

    public function loadContent()
    {
        (new HomePage())->render();
    }
}