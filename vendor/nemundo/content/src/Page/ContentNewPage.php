<?php

namespace Nemundo\Content\Page;


use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\Com\FormBuilder\UrlReferer\UrlRefererHiddenInput;
use Nemundo\Com\FormBuilder\UrlReferer\UrlRefererRequest;
use Nemundo\Com\FormBuilder\UrlReferer\UrlRefererSite;
use Nemundo\Com\Html\Hyperlink\UrlHyperlink;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\App\Explorer\Site\ExplorerSite;
use Nemundo\Content\Com\Container\ContentTypeFormContainer;
use Nemundo\Content\Index\Tree\Com\Breadcrumb\TreeBreadcrumb;
use Nemundo\Content\Index\Tree\Event\TreeEvent;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Content\Site\ContentViewSite;

class ContentNewPage extends AbstractTemplateDocument
{

    public function getContent()
    {


        $contentType = (new ContentTypeParameter())->getContentType();

        $event=new TreeEvent();
        $event->parentId = (new ContentParameter())->getValue();
        $contentType->addEvent($event);

        /*

$breadcrumb=new TreeBreadcrumb($this);
$breadcrumb->redirectSite=ContentViewSite::$site;
$breadcrumb->addParentContentType((new ContentParameter())->getContent());
$breadcrumb->addContentType((new ContentParameter())->getContent());
$breadcrumb->addActiveItem('New');
*/


        $widget = new AdminWidget($this);
        $widget->widgetTitle = $contentType->typeLabel;


        $container = new ContentTypeFormContainer($widget);
        $container->contentType = $contentType;
        $container->redirectSite =  new UrlRefererSite();

        return parent::getContent();

    }

}