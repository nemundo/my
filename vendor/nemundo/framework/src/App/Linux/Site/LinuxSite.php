<?php


namespace Nemundo\App\Linux\Site;


use Nemundo\App\Linux\Page\LinuxPage;
use Nemundo\Web\Site\AbstractSite;

class LinuxSite extends AbstractSite
{

    protected function loadSite()
    {

        $this->title='Linux';
        $this->url='linux';

    }


    public function loadContent()
    {

        (new LinuxPage())->render();

    }

}