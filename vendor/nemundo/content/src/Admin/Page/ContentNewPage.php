<?php


namespace Nemundo\Content\Admin\Page;


use Nemundo\Content\Admin\Site\ContentNewSite;
use Nemundo\Content\Admin\Site\ContentSite;
use Nemundo\Content\Admin\Template\ContentTemplate;
use Nemundo\Content\Com\Container\ContentTypeFormContainer;
use Nemundo\Content\Data\ContentType\ContentTypeReader;
use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Package\Bootstrap\Dropdown\BootstrapSiteDropdown;

class ContentNewPage extends ContentTemplate
{

    public function getContent()
    {

        $dropdown = new BootstrapSiteDropdown($this);

        $reader = new ContentTypeReader();
        $reader->addOrder($reader->model->contentType);
        foreach ($reader->getData() as $contentTypeRow) {
            $site = clone(ContentNewSite::$site);
            $site->title = $contentTypeRow->contentType;
            $site->addParameter(new ContentTypeParameter($contentTypeRow->id));
            $dropdown->addSite($site);
        }

        $contentTypeParameter = new ContentTypeParameter();
        if ($contentTypeParameter->exists()) {

            $contentType = (new ContentTypeReader())->getRowById($contentTypeParameter->getValue())->getContentType();

            if ($contentType->hasForm()) {
                $container = new ContentTypeFormContainer($this);
                $container->contentType = $contentType;
                $container->redirectSite = ContentSite::$site;
            } else {
                $p = new Paragraph($this);
                $p->content = 'No Form';
            }

        }

        return parent::getContent();

    }

}