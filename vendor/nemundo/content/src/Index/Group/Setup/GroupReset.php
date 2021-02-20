<?php


namespace Nemundo\Content\Index\Group\Setup;


use Nemundo\Content\Index\Group\Data\GroupType\GroupTypeDelete;
use Nemundo\Content\Index\Group\Data\GroupType\GroupTypeUpdate;

class GroupReset
{


    public function reset() {

        $update = new GroupTypeUpdate();
        $update->setupStatus=false;
        $update->update();

    }


    public function delete() {

        $delete = new GroupTypeDelete();
        $delete->filter->andEqual($delete->model->setupStatus, false);
        $delete->delete();

    }


}