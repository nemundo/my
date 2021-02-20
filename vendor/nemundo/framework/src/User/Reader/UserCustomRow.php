<?php

namespace Nemundo\User\Reader;


use Nemundo\User\Data\User\UserRow;
use Nemundo\User\Type\UserItemType;

class UserCustomRow extends UserRow
{

    public function getUserType()
    {

        $type = new UserItemType($this->id);
        return $type;

    }

}