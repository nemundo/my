<?php

namespace Nemundo\Content\App\Explorer\Page\Config;

use Nemundo\Content\App\Explorer\Template\ExplorerTemplate;
use Nemundo\Content\Index\Tree\Com\Admin\RestrictedContentTypeAdmin;

class AppConfigPage extends ExplorerTemplate
{
    public function getContent()
    {

//        new RestrictedContentTypeAdmin($this);


        return parent::getContent();
    }
}