<?php


namespace Nemundo\Content\Index\Group\Page;


use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\Admin\Template\ContentTemplate;
use Nemundo\Content\Index\Group\Com\Admin\GroupAdmin;

class GroupPage extends ContentTemplate
{

    public function getContent()
    {

        $admin = new GroupAdmin($this);


        return parent::getContent();

    }

}