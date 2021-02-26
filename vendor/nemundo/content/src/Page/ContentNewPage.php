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

        /*
        $contentParameter = new ContentParameter();
        $contentParameter->contentTypeCheck = false;
        $contentType = $contentParameter->getContent();*/


        $contentType = (new ContentTypeParameter())->getContentType();

        $event=new TreeEvent();
        $event->parentId = (new ContentParameter())->getValue();
        $contentType->addEvent($event);

        $breadcrumb=new TreeBreadcrumb($this);
        $breadcrumb->redirectSite=ContentViewSite::$site;
        $breadcrumb->addParentContentType((new ContentParameter())->getContent());
        $breadcrumb->addContentType((new ContentParameter())->getContent());
        $breadcrumb->addActiveItem('New');  // $contentType);



        $widget = new AdminWidget($this);
        $widget->widgetTitle = $contentType->typeLabel;


        /*
        $form = $contentType->getDefaultForm($widget);
        $hidden = new UrlRefererHiddenInput($form);
        $form->redirectSite = new UrlRefererSite();*/


        $container = new ContentTypeFormContainer($widget);
        $container->contentType = $contentType;
        $container->redirectSite =  new UrlRefererSite();  //clone(ExplorerSite::$site);
        //$container->redirectSite->addParameter($contentParamter);





        /*
        $hyperlink = new UrlHyperlink($this);
        $hyperlink->content = 'Zurück '. (new UrlRefererRequest())->getValue();
        $hyperlink->url = (new UrlRefererRequest())->getValue();
*/

        return parent::getContent();

    }

}