<?php

namespace Nemundo\Content\App\Team\Content\Team;

use Nemundo\Content\App\Team\Data\Team\Team;
use Nemundo\Content\App\Team\Data\Team\TeamReader;
use Nemundo\Content\App\Team\Data\Team\TeamRow;
use Nemundo\Content\App\Team\Data\Team\TeamUpdate;
use Nemundo\Content\Index\Group\Type\GroupIndexTrait;
use Nemundo\Content\Index\Tree\Type\AbstractTreeContentType;

class TeamContentType extends AbstractTreeContentType
{

    use GroupIndexTrait;

    public $team;

    protected function loadContentType()
    {
        $this->typeLabel = 'Team';
        $this->typeId = '9522966c-9f6e-4fdc-ae7d-03fcb84595de';
        $this->formClassList[] = TeamContentForm::class;
        $this->viewClassList[]  = TeamContentView::class;
    }

    protected function onCreate()
    {

        $data=new Team();
        $data->team=$this->team;
        $this->dataId=$data->save();


    }

    protected function onUpdate()
    {
        $update=new TeamUpdate();
        $update->team=$this->team;
        $update->updateById($this->dataId);

    }


    protected function onIndex()
    {
     $this->saveGroupIndex();
    }


    protected function onDataRow()
    {
        $this->dataRow=(new TeamReader())->getRowById($this->dataId);
    }

    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow|TeamRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }


    public function getSubject()
    {
        return $this->getDataRow()->team;
    }


}