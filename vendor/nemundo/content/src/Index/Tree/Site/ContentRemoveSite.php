<?php


namespace Nemundo\Content\Index\Tree\Site;


use Nemundo\Com\FormBuilder\UrlReferer\UrlRefererSite;
use Nemundo\Content\App\Explorer\Parameter\RefererContentParameter;
use Nemundo\Content\Index\Tree\Data\Tree\TreeDelete;
use Nemundo\Content\Index\Tree\Item\TreeItem;
use Nemundo\Content\Index\Tree\Parameter\TreeParameter;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Core\Http\Url\UrlRedirect;
use Nemundo\Core\Http\Url\UrlReferer;
use Nemundo\Package\FontAwesome\Site\AbstractDeleteIconSite;
use Nemundo\Web\Site\UrlSite;

class ContentRemoveSite extends AbstractDeleteIconSite
{

    /**
     * @var ContentRemoveSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Remove Content';
        $this->url = 'remove-content';

        ContentRemoveSite::$site = $this;

    }


    public function loadContent()
    {


        $treeId=(new TreeParameter())->getValue();
        (new TreeDelete())->deleteById($treeId);

        (new UrlReferer())->redirect();

        /*$parentParameter = new ParentParameter();
        $parentParameter->contentTypeCheck = false;
        $parentContentType = $parentParameter->getContentType();

        $parentContentType->removeChild((new ContentParameter())->getValue());*/

        //(new ContentParameter())->getContentType(false)->removeFromParent();







        /*
        $contentId = (new ContentParameter())->getValue();
        (new TreeItem(($contentId)))->removeFromParent();






        $refererParameter = new RefererContentParameter();
        if ($refererParameter->hasValue()) {


            //$site = clone(ExplorerSite::$site);

            $site = new UrlSite();  // new UrlRefererSite()
            $site->url = (new UrlReferer())->getUrl();

            $site->addParameter((new ContentParameter((new RefererContentParameter())->getValue())));
            $site->redirect();
        } else {
            (new UrlReferer())->redirect();
        }*/

    }

}