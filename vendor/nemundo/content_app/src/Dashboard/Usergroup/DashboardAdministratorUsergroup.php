<?php
namespace Nemundo\Content\App\Dashboard\Usergroup;
use Nemundo\User\Usergroup\AbstractUsergroup;
class DashboardAdministratorUsergroup extends AbstractUsergroup {
protected function loadUsergroup() {
$this->usergroup = 'DashboardAdministrator';
$this->usergroupId = '803b1f0e-5504-4e3d-9e0f-6221d9a4f115';
}
}