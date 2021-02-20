<?php

namespace Nemundo\Content\App\Explorer\Page;

use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Table\AdminLabelValueTable;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\App\Explorer\Collection\BaseContentTypeCollection;
use Nemundo\Content\App\Explorer\Site\ExplorerSite;
use Nemundo\Content\App\Explorer\Site\NewSite;
use Nemundo\Content\App\Explorer\Site\OldNewSite;
use Nemundo\Content\App\Explorer\Site\ViewSite;
use Nemundo\Content\App\Explorer\Template\ExplorerTemplate;
use Nemundo\Content\Com\ListBox\ContentTypeCollectionListBox;
use Nemundo\Content\Com\ListBox\ContentTypeListBox;
use Nemundo\Content\Data\Content\ContentCount;
use Nemundo\Content\Data\Content\ContentModel;
use Nemundo\Content\Data\Content\ContentPaginationReader;
use Nemundo\Content\Data\ContentType\ContentTypeReader;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Core\Type\Number\Number;
use Nemundo\Db\Filter\Filter;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;

class ExplorerMobilePage extends ExplorerTemplate
{
    public function getContent()
    {


        $form = new SearchForm($this);
        $form->site =  clone(NewSite::$site);

        $formRow = new BootstrapRow($form);

        $list= new ContentTypeCollectionListBox($formRow);  // new ContentTypeListBox($form);
        $list->contentTypeCollection=new BaseContentTypeCollection();
        $list->submitOnChange=true;

/*        $container->redirectSite = clone(NewSite::$site);
        $container->redirectSite->addParameter(new ContentParameter());*/



        /*
        $list=new BootstrapListBox($this);

        $reader=new ContentTypeReader();



        /*
        $table = new AdminClickableTable($this);

        //$header = new TableHeader($table);

        //$header->addText('Subject');

        $contentReader = new ContentPaginationReader();
        $contentReader->model->loadContentType();
        $contentReader->model->contentType->loadApplication();
        $contentReader->model->loadUser();

        $filter = new Filter();
        $model = new ContentModel();

        /*$contentTypeParameter = new ContentTypeParameter();
        $contentTypeParameter->contentTypeCheck = false;
        if ($contentTypeParameter->hasValue()) {
            $filter->andEqual($model->contentTypeId, $contentTypeParameter->getValue());
            $contentType = $contentTypeParameter->getContentType();
        }

        $count = new ContentCount();
        $count->model->loadContentType();
        $count->filter = $filter;
        $contentCount = $count->getCount();

        $p->content = (new Number($contentCount))->formatNumber() . ' Content found';*/

        //$contentReader->filter = $filter;
        /*$contentReader->addOrder($contentReader->model->id, SortOrder::DESCENDING);
        $contentReader->paginationLimit = 50;

        foreach ($contentReader->getData() as $contentRow) {

            $contentType = $contentRow->getContentType();

            $row = new BootstrapClickableTableRow($table);
            $row->addText($contentType->getSubject());
            //$row->addText($contentType->getText());
            $row->addText($contentRow->contentType->contentType);

            $site = clone(ViewSite::$site);
            $site->addParameter(new ContentParameter($contentRow->id));
            //$site->addParameter(new ContentTypeParameter());
            $row->addClickableSite($site);

        }*/

        return parent::getContent();
    }
}