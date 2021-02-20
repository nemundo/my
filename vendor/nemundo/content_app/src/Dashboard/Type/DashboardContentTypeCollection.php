<?php


namespace Nemundo\Content\App\Dashboard\Type;


use Nemundo\Content\App\Dashboard\Data\Dashboard\DashboardReader;
use Nemundo\Content\Collection\AbstractContentTypeCollection;


class DashboardContentTypeCollection extends AbstractContentTypeCollection
{

    // static

    protected function loadCollection()
    {

        $reader = new DashboardReader();
        $reader->model->loadContent();
        $reader->model->content->loadContentType();
        foreach ($reader->getData() as $dashboardRow) {

            $contentType = $dashboardRow->content->getContentType();
            $this->addContentType($contentType);

        }

    }

}