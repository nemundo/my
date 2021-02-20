<?php

namespace Nemundo\User\Login;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\User\Data\User\UserCount;
use Nemundo\User\Login\Session\UserIdSession;
use Nemundo\User\Type\UserSessionType;


class UserCheck extends AbstractBase
{


    public function checkUser()
    {

        // todo: speichern in static variable

        //(new Debug())->write('check user');

        $userType = (new UserSessionType());

        //(new Debug())->write($userType->login);
        //exit;


        $userId = (new UserIdSession())->getValue();

        $count = new UserCount();
        $count->filter->andEqual($count->model->id, $userId);
        $count->filter->andEqual($count->model->active, true);

        $returnValue = false;
        if ($count->getCount() == 1) {
            $returnValue = true;
        } else {
            $logout = new UserLogout();
            $logout->logout();
        }

        return $returnValue;

    }


}