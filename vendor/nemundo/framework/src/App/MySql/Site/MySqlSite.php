<?php

namespace Nemundo\App\MySql\Site;

use Nemundo\App\MySql\Page\MySqlPage;
use Nemundo\App\MySql\Site\Action\DropTableSite;
use Nemundo\App\MySql\Site\Action\EmptyTableSite;
use Nemundo\Web\Site\AbstractSite;

class MySqlSite extends AbstractSite
{

    /**
     * @var MySqlSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'MySql';
        $this->url = 'mysql';

        MySqlSite::$site=$this;

        new MySqlTableSite($this);
        new DropTableSite($this);
        new EmptyTableSite($this);
        new DatabaseSite($this);

    }


    public function loadContent()
    {
        (new MySqlPage())->render();
    }

}