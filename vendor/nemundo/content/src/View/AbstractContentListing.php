<?php


namespace Nemundo\Content\View;


use Nemundo\Content\Index\Tree\Type\AbstractTreeContentType;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Content\Parameter\DataIdParameter;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Web\Site\AbstractSite;

// AbstractContentListing
abstract class AbstractContentListing extends AbstractHtmlContainer
{

    /**
     * @var AbstractContentType|AbstractTreeContentType
     */
    public $contentType;

    /**
     * @var AbstractSite
     */
    public $redirectSite;


    protected function getRedirectSite($dataId)
    {

        $site = clone($this->redirectSite);
        $site->addParameter(new DataIdParameter($dataId));
        //$site->addParameter(new ContentParameter($this->contentType->getContentId()));

        return $site;

    }


    protected function getContentRedirectSite($contentId)
    {

        $site = clone($this->redirectSite);
        $site->addParameter(new ContentParameter($contentId));

        return $site;

    }


}