<?php


namespace Nemundo\Content\App\Explorer\Com\Breadcrumb;


use Nemundo\Content\App\Explorer\Site\ItemSite;
use Nemundo\Content\Index\Tree\Reader\ParentContentTypeReader;
use Nemundo\Content\Index\Tree\Type\AbstractTreeContentType;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Package\Bootstrap\Breadcrumb\BootstrapBreadcrumb;

// nach Content/Index/Com

class ExplorerTreeBreadcrumb extends BootstrapBreadcrumb
{

    /**
     * @var AbstractContentType
     */
    public $contentType;

    // redirectSite

    public function addContentType(AbstractContentType $contentType) {


        $reader=new ParentContentTypeReader();
        $reader->contentType=$contentType;
        foreach ($reader->getData() as $contentItem) {

            $site = clone(ItemSite::$site);
            $site->title = $contentItem->getSubject();
            $site->addParameter(new ContentParameter($contentItem->getContentId()));
            $this->addSite($site);

        }


        /*
        foreach ($contentType->getParentParentContentTypeList() as $parent) {
            $site = clone(ItemSite::$site);
            $site->title = $parent->getSubject();
            $site->addParameter(new ContentParameter($parent->getContentId()));
            $this->addSite($site);
        }

        $this->addActiveItem($contentType->getSubject());
*/

    }


    public function getContent()
    {

        /*foreach ($this->contentType->getParentParentContentTypeList() as $parent) {
            $site = clone(ItemSite::$site);
            $site->title = $parent->getSubject();
            $site->addParameter(new ContentParameter($parent->getContentId()));
            $this->addSite($site);
        }
        $this->addActiveItem($this->contentType->getSubject());*/

        return parent::getContent();

    }

}