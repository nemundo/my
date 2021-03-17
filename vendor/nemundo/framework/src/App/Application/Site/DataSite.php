<?php

namespace Nemundo\App\Application\Site;


use Nemundo\App\Application\Page\DataPage;
use Nemundo\App\MySql\Page\MySqlApplicationDataPage;
use Nemundo\App\MySql\Site\Action\DropTableSite;
use Nemundo\App\MySql\Site\Action\EmptyTableSite;
use Nemundo\Web\Site\AbstractSite;


class DataSite extends AbstractSite
{

    protected function loadSite()
    {

        $this->title = 'Data';
        $this->url = 'application-data';

        new DropTableSite($this);
        new EmptyTableSite($this);

    }


    public function loadContent()
    {

        (new DataPage())->render();

    }

}