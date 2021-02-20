<?php

namespace Nemundo\Model\Type\User;

use Nemundo\Model\Data\Property\User\CreatedUserDataProperty;
use Nemundo\Model\Type\Id\UniqueIdType;

class ModifiedUserType extends UniqueIdType  // UserExternalType
{


    protected function loadExternalType()
    {
        parent::loadExternalType();

        $this->visible->form = false;
        $this->updatePropertyClassName = CreatedUserDataProperty::class;

    }


    /*
    protected function loadType()
    {
        parent::loadType();

        $this->fieldName = 'modified_user';
        $this->label = 'Modified User';
        $this->visible->form = false;

        $this->dataPropertyClassName = CreatedUserDataProperty::class;
        $this->updatePropertyClassName = CreatedUserDataProperty::class;

    }*/

}