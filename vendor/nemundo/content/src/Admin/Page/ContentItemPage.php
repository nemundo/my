<?php


namespace Nemundo\Content\Admin\Page;


use Nemundo\Admin\Com\Button\AdminIconSiteButton;
use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Table\AdminLabelValueTable;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Content\Admin\Site\ContentDeleteSite;
use Nemundo\Content\Admin\Site\ContentEditSite;
use Nemundo\Content\Admin\Site\ContentItemSite;
use Nemundo\Content\Admin\Site\ContentNewSite;
use Nemundo\Content\Admin\Site\ContentSite;
use Nemundo\Content\Admin\Template\ContentTemplate;
use Nemundo\Content\App\Explorer\Site\ItemSite;
use Nemundo\Content\App\Log\Com\Container\LogContainer;
use Nemundo\Content\Com\Container\JsonContentContainer;
use Nemundo\Content\Com\ListBox\ContentViewListBox;
use Nemundo\Content\Data\Content\ContentReader;
use Nemundo\Content\Data\ContentType\ContentTypeReader;
use Nemundo\Content\Index\Geo\Com\Container\GeoIndexContainer;
use Nemundo\Content\Index\Search\Data\SearchIndex\SearchIndexReader;
use Nemundo\Content\Index\Search\Type\SearchIndexTrait;
use Nemundo\Content\Index\Tree\Com\Container\TreeIndexContainer;
use Nemundo\Content\Index\Tree\Data\Tree\TreeReader;
use Nemundo\Content\Index\Tree\Type\TreeIndexTrait;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Package\Bootstrap\Dropdown\BootstrapSiteDropdown;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;

class ContentItemPage extends ContentTemplate
{

    public function getContent()
    {


        $contentType = (new ContentParameter())->getContentType(false);

        $contentReader = new ContentReader();
        //$contentReader->model->loadUser();
        $contentRow = $contentReader->getRowById($contentType->getContentId());

        $title = new AdminTitle($this);
        $title->content = $contentType->getSubject();

        $view = new ContentViewListBox($this);
        $view->contentType = $contentType;



        /*if ($contentType->hasView()) {
            $contentType->getView($page);
        } else {
            $p = new Paragraph($page);
            $p->content = '[No View]';
        }*/


        $layout=new BootstrapTwoColumnLayout($this);


        $table1 = new AdminLabelValueTable($layout->col1);
        $table1->addLabelValue('Subject', $contentType->getSubject());

        if ($contentType->isObjectOfTrait(TreeIndexTrait::class)) {
            $table1->addLabelYesNoValue('Has Parent', $contentType->hasParent());
            $table1->addLabelValue('Child Count', $contentType->getChildCount());
            $table1->addLabelValue('Parent Count', $contentType->getParentCount());
        }

        $table1->addLabelValue('Content Type Class', $contentType->getClassName());
        $table1->addLabelValue('Content Type Id', $contentType->typeId);

        $table1->addLabelValue('Content Id', $contentType->getContentId());
        $table1->addLabelValue('Data Id', $contentType->getDataId());


        //$table1->addLabelValue($contentReader->model->dateTime->label, $contentRow->dateTime->getShortDateTimeWithSecondLeadingZeroFormat());
        //$table1->addLabelValue($contentReader->model->user->label, $contentRow->user->displayName);


        if ($contentType->hasView()) {
            $view = $contentType->getDefaultView();
            $table1->addLabelValue('View Class', $view->getClassName());
            $table1->addLabelCom('View', $view);
        } else {
            $table1->addLabelValue('View', '[No View]');
        }


        if ($contentType->hasViewSite()) {
            $table1->addLabelSite('View Site', $contentType->getViewSite());
            $table1->addLabelSite('Subject View Site', $contentType->getSubjectViewSite());
        } else {
            $table1->addLabelValue('View Site', '[No View Site]');
        }


        if ($contentType->isObjectOfTrait(TreeIndexTrait::class)) {

            $subtitle = new AdminSubtitle($layout->col2);
            $subtitle->content = 'Child';

            $table = new AdminClickableTable($this);

            $header = new TableHeader($table);
            $header->addText('Content Type');
            $header->addText('Subject (Data)');
            $header->addText('Subject (Type)');
            $header->addText('Item Order');
            $header->addText('Class');

            $header->addText('Date/Time');


            foreach ($contentType->getChild() as $contentRow) {

                $childContentType = $contentRow->getContentType();

                $row = new BootstrapClickableTableRow($table);
                $row->addText($contentRow->contentType->contentType);
                $row->addText($contentRow->subject);
                $row->addText($childContentType->getSubject());
                $row->addText($contentRow->itemOrder);
                $row->addText($childContentType->getClassName());

                //$row->addText($contentRow->dateTime->getShortDateTimeWithSecondLeadingZeroFormat());


                $site = clone(ContentItemSite::$site);
                $site->addParameter(new ContentParameter($contentRow->id));
                //$site->title =$parentContentType->getSubject();  // $contentRow->subject;
                $row->addClickableSite($site);


            }


            if ($contentType->hasParent()) {

                $subtitle = new AdminSubtitle($layout->col1);
                $subtitle->content = 'Parent Type';

                $table = new AdminClickableTable($layout->col1);

                $header->addText('Content Type');
                $header->addText('Subject');

                foreach ($contentType->getParentContent() as $contentRow) {

                    $row = new BootstrapClickableTableRow($table);

                    $parentContentType = $contentRow->getContentType();
                    $row->addText($parentContentType->typeLabel);

                    $row->addText($parentContentType->getSubject());
                    $site = clone(ContentItemSite::$site);
                    $site->addParameter(new ContentParameter($contentRow->id));
                    //$site->title =$parentContentType->getSubject();  // $contentRow->subject;
                    $row->addClickableSite($site);

                }

            }

        }

        $btn = new AdminIconSiteButton($layout->col1);
        $btn->site = ContentEditSite::$site;
        $btn->site->addParameter(new ContentParameter());

        $btn = new AdminIconSiteButton($layout->col1);
        $btn->site = ContentDeleteSite::$site;
        $btn->site->addParameter(new ContentParameter());


        /*
        $subtitle = new AdminSubtitle($page);
        $subtitle->content = 'Content User';

        $list = new UnorderedList($page);

        $reader = new ContentGroupReader();
        $reader->model->loadGroup();
        $reader->filter->andEqual($reader->model->contentId, $contentType->getContentId());
        foreach ($reader->getData() as $contentGroupRow) {
            $list->addText($contentGroupRow->group->group);
        }*/


        //$btn = new FavoriteButton($page);
        //$btn->dataId = $dataId;


        if ($contentType->isObjectOfTrait(SearchIndexTrait::class)) {

            $table1->addLabelValue('Search', 'yes');

            $table = new AdminTable($layout->col2);

            $header = new TableHeader($table);
            $header->addText('Search Word');

            $reader = new SearchIndexReader();
            $reader->model->loadWord();
            $reader->filter->andEqual($reader->model->contentId, $contentType->getContentId());
            foreach ($reader->getData() as $searchIndexRow) {

                $row = new TableRow($table);
                $row->addText($searchIndexRow->word->word);

            }

        } else {

            $table1->addLabelValue('Search', 'no');

        }



        $container=new GeoIndexContainer($layout->col2);
        $container->contentType=$contentType;
        $container->redirectSite=ItemSite::$site;

        $container=new JsonContentContainer($layout->col2);
        $container->contentType = $contentType;



        $table=new AdminTable($layout->col2);

        $header=new TableHeader($table);
        $header->addText('Parent');

        $reader = new TreeReader();
        $reader->model->loadParent();
        $reader->model->parent->loadContentType();
        //$reader->model->child->loadUser();
        $reader->model->loadView();
        $reader->filter->andEqual($reader->model->childId, $contentType->getContentId());
        //$reader->addOrder($reader->model->itemOrder, $sortOrder);
        foreach ($reader->getData() as $treeRow) {
            /*$treeRow->child->itemOrder = $treeRow->itemOrder;
            $childList[] = $treeRow->child;*/
            //$childList[] = $treeRow;

            $row=new TableRow($table);
            $row->addText($treeRow->parent->subject);

        }





        /*
        $container=new TreeIndexContainer($layout->col2);
        $container->contentType = $contentType;
        $container->redirectSite=ContentItemSite::$site;
*/




        /*
        $container=new LogContainer($layout->col2);
        $container->contentType = $contentType;

        /*
        if ($contentType->isObjectOfTrait(MenuTrait::class)) {

            $dropdown = new BootstrapSiteDropdown($page);

            //$reader = new ContentTypeReader();
            //foreach ($reader->getData() as $contentTypeRow) {

            foreach ($contentType->getMenuList() as $menuContentType) {

                $site = clone(ContentItemSite::$site);
                $site->title = $menuContentType->typeLabel;  // $contentTypeRow->contentType;
                $site->addParameter(new ContentParameter());
                $site->addParameter(new ContentTypeParameter($menuContentType->typeId));

                $dropdown->addSite($site);

            }

        }*/


        /* $contentTypeParameter = new ContentTypeParameter();
        if ($contentTypeParameter->exists()) {

            $contentType = (new ContentTypeReader())->getRowById($contentTypeParameter->getValue())->getContentType();


            $form = $contentType->getForm($page);
            $form->parentId = $dataId;
            $form->redirectSite = ContentItemSite::$site;
            $form->redirectSite->addParameter(new DataParameter());

        }*/


        /*
        foreach ($contentType->getChild() as $contentRow) {

            $subtitle = new AdminSubtitle($page);
            $subtitle->content = $contentRow->dateTime->getShortDateTimeFormat();

            $contentType = $contentRow->getContentType();

            if ($contentType->hasView()) {
                $div = new Div($page);
                $contentType->getView($div);
            }

            // $view = $contentRow->contentType->getContentType()->getView($div);
            //  $view->dataId = $contentRow->id;

            $btn = new AdminSiteButton($page);
            $btn->site = clone(ContentItemSite::$site);
            $btn->site->addParameter(new ContentParameter($contentRow->id));
            $btn->site->title = 'View';

        }*/



        return parent::getContent();

    }

}