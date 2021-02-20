<?php

namespace Nemundo\Content\App\Explorer\Site\Share;

use Nemundo\Content\App\Explorer\Data\PublicShare\PublicShare;
use Nemundo\Content\App\Explorer\Data\PublicShare\PublicShareDelete;
use Nemundo\Content\App\Explorer\Page\Share\PublicShareEditPage;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Core\Http\Url\UrlReferer;
use Nemundo\Package\FontAwesome\Site\AbstractDeleteIconSite;
use Nemundo\Web\Site\AbstractSite;

class PublicShareDeleteSite extends AbstractDeleteIconSite
{

    /**
     * @var PublicShareDeleteSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Public share Delete';
        $this->url = 'public-share-delete';

        PublicShareDeleteSite::$site = $this;
    }

    public function loadContent()
    {

        $delete= new PublicShareDelete();
        $delete->filter->andEqual($delete->model->contentId, (new ContentParameter())->getValue());
        $delete->delete();

        (new UrlReferer())->redirect();

    }
}