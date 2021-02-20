<?php


namespace Nemundo\Content\Index\Group\Site;


use Nemundo\Content\Index\Group\Page\GroupPage;
use Nemundo\Core\Language\LanguageCode;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Content\Index\Group\Com\Admin\GroupAdmin;
use Nemundo\Web\Site\AbstractSite;


class GroupSite extends AbstractSite
{

    /**
     * @var GroupSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title[LanguageCode::EN] = 'Group';
        $this->title[LanguageCode::DE] = 'Gruppen';
        $this->url = 'group';
        GroupSite::$site = $this;

        //new GroupUserDeleteSite($this);
        //new GroupContentViewSite($this);

    }


    public function loadContent()
    {

        (new GroupPage())->render();


        /*
        $page = (new DefaultTemplateFactory())->getDefaultTemplate();


        $admin = new GroupAdmin($page);


        $page->render();*/

    }

}