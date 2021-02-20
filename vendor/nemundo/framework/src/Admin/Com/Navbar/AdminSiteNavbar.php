<?php

namespace Nemundo\Admin\Com\Navbar;


namespace Nemundo\Admin\Com\Navbar;


use Nemundo\Content\Index\Search\Site\Json\SearchJsonSite;
use Nemundo\Content\Index\Search\Site\SearchSite;
use Nemundo\Package\Bootstrap\Autocomplete\AbstractAutocompleteJsonSite;
use Nemundo\Package\Bootstrap\Navbar\BootstrapNavbarLogo;
use Nemundo\Package\Bootstrap\Navbar\BootstrapNavbarSearchForm;
use Nemundo\Package\Bootstrap\Navbar\BootstrapNavbarToggler;
use Nemundo\Package\Bootstrap\Navbar\BootstrapSiteNavbar;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Web\Site\BaseUrlSite;


// ContentSiteNavbar
// ContentAppSiteNavbar

class AdminSiteNavbar extends BootstrapSiteNavbar
{

    public $logoUrl;

    /**
     * @var bool
     */
    public $searchMode = false;

    /**
     * @var AbstractSite
     */
    public $searchSite;

    /**
     * @var AbstractAutocompleteJsonSite
     */
    public $searchSourceSite;


    public function getContent()
    {

        $logo = new BootstrapNavbarLogo();
        $logo->logoSite = new BaseUrlSite();
        $logo->logoUrl = $this->logoUrl;
        $this->containerDiv->addContainerAtFirst($logo);

        $toggler = new BootstrapNavbarToggler();
        $this->containerDiv->addContainerAtFirst($toggler);

        if ($this->searchMode) {

            $search = new BootstrapNavbarSearchForm($this);
            $search->site =  $this->searchSite;
            $search->sourceSite = $this->searchSourceSite;

        }

        return parent::getContent();

    }

}

