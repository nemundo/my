<?php


namespace Nemundo\App\Application\Site;


use Nemundo\App\Application\Data\Application\ApplicationReader;
use Nemundo\Web\Site\AbstractSite;


class AppSite extends AbstractSite
{

    protected function loadSite()
    {

        $this->title = 'App';
        $this->url = 'app';

        $reader = new ApplicationReader();
        $reader->filter->andEqual($reader->model->install, true);
        $reader->addOrder($reader->model->application);
        foreach ($reader->getData() as $applicationRow) {

            $app = $applicationRow->getApplication();
            if ($app->hasSite()) {
                $app->getSite($this);
            }

        }

    }


    public function loadContent()
    {

    }

}