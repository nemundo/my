<?php

namespace Nemundo\Content\App\Job\Site;

use Nemundo\Content\App\Job\Page\JobPage;
use Nemundo\Web\Site\AbstractSite;

class JobSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'Job';
        $this->url = 'job';

        new JobClearSite($this);

    }

    public function loadContent()
    {
        (new JobPage())->render();
    }
}