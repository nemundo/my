<?php

namespace Nemundo\Content\App\Dashboard\Content\Dashboard;

use Nemundo\Content\App\Dashboard\Content\DashboardColumn\DashboardColumnContentType;
use Nemundo\Content\App\Dashboard\Data\Dashboard\Dashboard;
use Nemundo\Content\App\Dashboard\Data\Dashboard\DashboardReader;
use Nemundo\Content\App\Dashboard\Data\Dashboard\DashboardRow;
use Nemundo\Content\App\Dashboard\Data\Dashboard\DashboardUpdate;
use Nemundo\Content\Index\Tree\Event\TreeEvent;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Content\View\Listing\ContentListing;
use Nemundo\Core\Random\UniqueId;
use Nemundo\Core\Structure\ForLoop;
use Nemundo\Core\Url\UrlConverter;

class DashboardContentType extends AbstractContentType
{


    public $dashboard;

    /**
     * @var int
     */
    public $columnCount = 1;


    //public $uniqueName;

    protected function loadContentType()
    {
        $this->typeLabel = 'Dashboard';
        $this->typeId = 'c5944481-f5d5-46c7-a4c7-5b7d966eb794';
        $this->formClassList[] = DashboardContentForm::class;
        $this->viewClassList[]  = DashboardContentView::class;
        $this->listingClass = ContentListing::class;

    }


    /*
    public function fromUniqueName()
    {

        $id = new DashboardId();
        $id->filter->andEqual($id->model->uniqueName, $this->uniqueName);
        $this->dataId = $id->getId();

        return $this;

    }*/


    protected function onCreate()
    {

        if ($this->dataId == null) {
            $this->dataId = (new UniqueId())->getUniqueId();
        }

        $data = new Dashboard();
        $data->id = $this->dataId;
        $data->dashboard = $this->dashboard;
        $data->url = (new UrlConverter())->convertToUrl($this->dashboard);
        $data->save();

        $this->saveContent();

        $columnWidth = 12/$this->columnCount;

        $loop = new ForLoop();
        $loop->minNumber = 1;
        $loop->maxNumber = $this->columnCount;
        foreach ($loop->getData() as $number) {

            $event = new TreeEvent();
            $event->parentId = $this->getContentId();

            $type = new DashboardColumnContentType();
            $type->columnWidth=$columnWidth;
            $type->addEvent($event);
            $type->saveType();

        }

    }


    protected function onUpdate()
    {

        $update = new DashboardUpdate();
        $update->dashboard = $this->dashboard;
        $update->url = (new UrlConverter())->convertToUrl($this->dashboard);
        $update->updateById($this->dataId);

    }


    protected function onDataRow()
    {
        $this->dataRow = (new DashboardReader())->getRowById($this->dataId);
    }

    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow|DashboardRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }


    public function getSubject()
    {
        return $this->getDataRow()->dashboard;
    }


    /*
    public function existItem()
    {

        $value = false;

        $count = new DashboardCount();
        $count->filter->andEqual($count->model->uniqueName, $this->uniqueName);
        if ($count->getCount() == 1) {

            $value = true;

            $id = new DashboardId();
            $id->filter->andEqual($id->model->uniqueName, $this->uniqueName);
            $this->dataId = $id->getId();

        }

        return $value;

    }*/


}