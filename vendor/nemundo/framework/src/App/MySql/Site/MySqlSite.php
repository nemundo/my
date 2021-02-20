<?php

namespace Nemundo\App\MySql\Site;

use Nemundo\App\MySql\Page\MySqlPage;
use Nemundo\App\MySql\Site\Action\DropTableSite;
use Nemundo\App\MySql\Site\Action\EmptyTableSite;
use Nemundo\Web\Site\AbstractSite;

class MySqlSite extends AbstractSite
{

    protected function loadSite()
    {

        $this->title = 'MySql';
        $this->url = 'mysql';

        new DropTableSite($this);
        new EmptyTableSite($this);

    }


    public function loadContent()
    {
        (new MySqlPage())->render();
    }

}