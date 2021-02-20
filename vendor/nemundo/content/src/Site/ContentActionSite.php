<?php

namespace Nemundo\Content\Site;


use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\Content\Action\AbstractContentAction;
use Nemundo\Content\Parameter\ContentActionParameter;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Core\Http\Url\UrlReferer;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Web\Site\AbstractSite;

class ContentActionSite extends AbstractSite
{

    /**
     * @var ContentActionSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Content Action';
        $this->url = 'content-action';
        $this->menuActive = false;

        ContentActionSite::$site = $this;

    }


    public function loadContent()
    {

        /** @var AbstractContentAction $action */
        $action = (new ContentActionParameter())->getContentType(false);
        $action->actionContentId = (new ContentParameter())->getValue();


        $found = false;

        if ($action->hasForm()) {

            $document = (new DefaultTemplateFactory())->getDefaultTemplate();

            $layout = new BootstrapTwoColumnLayout($document);

            $contentType = (new ContentParameter())->getContentType(false);

            $widget = new AdminWidget($layout->col1);
            $widget->widgetTitle = $contentType->getSubject();

            $contentType->getDefaultView($widget);

            $widget = new AdminWidget($layout->col2);
            $widget->widgetTitle = $action->actionLabel;  // 'Send to';

            $form = $action->getDefaultForm($widget);


            /*
            $hidden = new TextInput($form);  // new HiddenInput($form);
            $hidden->name = 'url_referer';
            //$hidden->value = (new UrlReferer())->getUrl();


            $urlRefererRequest = new PostRequest('url_referer');
            if ($urlRefererRequest->hasValue()) {
                $hidden->value = $urlRefererRequest->getValue();



            } else {
                $hidden->value = (new UrlReferer())->getUrl();
            }*/

            //(new Debug())->write((new UrlReferer())->getUrl());

            $document->render();

            $found = true;

        }


        if ($action->hasViewSite()) {

            $site = $action->getViewSite();  //->redirect();
            $site->addParameter(new ContentParameter());
            $site->redirect();

            $found = true;

        }


        if (!$found) {

            $action->onAction();
            (new UrlReferer())->redirect();

        }


    }

}