<?php


namespace Nemundo\Content\Index\Group\Com\ListBox;


use Nemundo\Core\Language\LanguageCode;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;
use Nemundo\Content\Index\Group\Com\GroupContentTypeTrait;
use Nemundo\Content\Index\Group\Data\Group\GroupReader;
use Nemundo\Content\Index\Group\Parameter\GroupParameter;
use Nemundo\Content\Index\Group\Type\AbstractGroupContentType;

class MultiGroupListBox extends BootstrapListBox
{

    use GroupContentTypeTrait;

    /**
     * @var bool
     */
    public $showGroupTypeTitle = true;

    protected function loadContainer()
    {

        parent::loadContainer();

        $this->label[LanguageCode::EN] = 'Group';
        $this->label[LanguageCode::DE] = 'Gruppe';
        $this->name = (new GroupParameter())->getParameterName();

    }


    public function addUserOfGroup(AbstractGroupContentType $groupContentType ) {


        foreach ($groupContentType->getUserList() as $userRow) {



        }



    }






    public function getContent()
    {

        foreach ($this->groupContentTypeList as $groupContentType) {

            if ($this->showGroupTypeTitle) {
                $this->addItemTitle($groupContentType->typeLabel);
            }

            $groupReader = new GroupReader();
            $groupReader->filter->andEqual($groupReader->model->groupTypeId, $groupContentType->typeId);
            $groupReader->filter->andEqual($groupReader->model->active,true);
            $groupReader->addOrder($groupReader->model->group);
            foreach ($groupReader->getData() as $groupRow) {
                $this->addItem($groupRow->id, $groupRow->group);
            }

        }

        return parent::getContent();

    }


}