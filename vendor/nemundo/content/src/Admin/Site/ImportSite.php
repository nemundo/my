<?php


namespace Nemundo\Content\Admin\Site;


use Nemundo\Content\Admin\Page\ImportPage;
use Nemundo\Web\Site\AbstractSite;

class ImportSite extends AbstractSite
{


    protected function loadSite()
    {

        $this->title = 'Import';
        $this->url = 'import';

    }

    public function loadContent()
    {

        (new ImportPage())->render();
    }


}