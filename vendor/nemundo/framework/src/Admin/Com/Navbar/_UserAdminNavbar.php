<?php

namespace Nemundo\Admin\Com\Navbar;


use Nemundo\Admin\AdminConfig;
use Nemundo\App\UserAction\Site\LogoutSite;
use Nemundo\App\UserAction\Site\PasswordChangeSite;
use Nemundo\Package\Bootstrap\Navbar\BootstrapNavbarLogo;
use Nemundo\Package\Bootstrap\Navbar\BootstrapSiteNavbar;
use Nemundo\Web\WebConfig;


class UserAdminNavbar extends BootstrapSiteNavbar
{

    public function getContent()
    {

        $this->fixed = true;

        $this->site = AdminConfig::$webController;

        /*
        $this->addUserMenuSite(MyFlightSite::$site);
        $this->addUserMenuSite(SettingSite::$site);
        $this->addUserMenuDivider();*/


        //$this->addUserMenuSite(UserConfigSite\ UserConfigSite::$site);
        $this->addUserMenuDivider();
        $this->addUserMenuSite(PasswordChangeSite::$site);
        $this->addUserMenuSite(LogoutSite::$site);

        return parent::getContent();

    }

}