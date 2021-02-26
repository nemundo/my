<?php

namespace Nemundo\Content\App\Explorer\Page;

use Nemundo\Admin\Com\Button\AdminCopyButton;
use Nemundo\Admin\Com\Button\AdminIconSiteButton;
use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Com\Html\Listing\UnorderedList;
use Nemundo\Content\App\Calendar\Com\Container\CalendarContainer;
use Nemundo\Content\App\Explorer\Collection\BaseContentTypeCollection;
use Nemundo\Content\App\Explorer\Com\Dropdown\MenuDropdown;

use Nemundo\Content\App\Explorer\Parameter\PublicShareParameter;
use Nemundo\Content\App\Explorer\Site\ExplorerSite;
use Nemundo\Content\App\Explorer\Site\NewSite;
use Nemundo\Content\App\Explorer\Site\Share\PublicShareDeleteSite;

use Nemundo\Content\App\Explorer\Template\ExplorerTemplate;
use Nemundo\Content\App\Favorite\Action\FavoriteSaveContentAction;
use Nemundo\Content\App\Inbox\Action\SendToContentAction;
use Nemundo\Content\App\PublicShare\Action\PublicShareAction;
use Nemundo\Content\Com\Container\ContentPropertyContainer;
use Nemundo\Content\Com\Dropdown\ContentActionDropdown;
use Nemundo\Content\Com\Dropdown\ContentTypeCollectionSubmenuDropdown;
use Nemundo\Content\Com\Input\ContentHiddenInput;
use Nemundo\Content\Com\ListBox\ContentViewListBox;
use Nemundo\Content\Com\Widget\ContentWidget;
use Nemundo\Content\Index\Geo\Com\Container\GeoIndexContainer;
use Nemundo\Content\Index\Group\Com\Container\GroupContainer;
use Nemundo\Content\Index\Log\Com\Container\LogContainer;
use Nemundo\Content\Index\Relation\Com\Widget\RelationIndexWidget;
use Nemundo\Content\Index\Tree\Com\Breadcrumb\TreeBreadcrumb;
use Nemundo\Content\Index\Tree\Com\Container\TreeIndexContainer;
use Nemundo\Content\Index\Tree\Com\Dropdown\RestrictedContentTypeDropdown;
use Nemundo\Content\Index\Tree\Com\Form\ContentViewChangeForm;
use Nemundo\Content\Index\Tree\Data\Tree\TreeReader;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Db\Sql\Field\CountField;
use Nemundo\Html\Header\Title;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;
use Nemundo\Package\Bootstrap\Layout\BootstrapThreeColumnLayout;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;


// TreePage
class _OldExplorerPageExplorerPage extends ExplorerTemplate
{

    public function getContent()
    {


        $contentType = (new ContentParameter())->getContent(false);

        $title = new Title($this);
        $title->content = $contentType->getSubject();



        //$this->pageTitle = $contentType->getSubject();


        //$title = new Title($this);
        //$title->content = $contentType->getSubject();

        //if ($contentType->isObjectOfTrait(TreeIndexTrait::class)) {

        $breadcrumb = new TreeBreadcrumb($this);
        $breadcrumb->redirectSite = ExplorerSite::$site;
        $breadcrumb->addActiveParentContentType($contentType);

       /* $breadcrumb->addParentContentType($contentType);
        $breadcrumb->addActiveItem($contentType->getSubject());
*/
        //}


        $layout = new BootstrapTwoColumnLayout($this);
        $layout->col1->columnWidth = 8;
        $layout->col2->columnWidth = 4;


        if ($contentType->hasView()) {

//            $widget = new AdminWidget($layout->col1);
//            $widget->widgetTitle = $contentType->getSubject();


            $widget = new ContentWidget($layout->col1);
            $widget->contentType = $contentType;  //->getSubject();




            $div = new BootstrapThreeColumnLayout($widget);
            $div->col1->columnWidth = 1;
            $div->col2->columnWidth = 1;
            $div->col3->columnWidth = 2;


            /*
            $dropdown = new ContentTypeCollectionSubmenuDropdown($div->col1);
            $dropdown->redirectSite = clone(NewSite::$site);
            $dropdown->redirectSite->addParameter(new ContentParameter());
            foreach ((new BaseContentTypeCollection())->getContentTypeList() as $child) {
                $dropdown->addContentType($child);
            }*/


            $dropdown=new RestrictedContentTypeDropdown($div->col1);
            $dropdown->redirectSite = clone(NewSite::$site);
            $dropdown->redirectSite->addParameter(new ContentParameter());
            $dropdown->contentTypeId = $contentType->typeId;


            /*
           if ($contentType->isObjectOfTrait(TreeIndexTrait::class)) {

               if ($contentType->allowChild) {

                   if ($contentType->restrictedChild) {

                       $dropdown = new ContentTypeCollectionSubmenuDropdown($div->col1);
                       $dropdown->redirectSite = clone(NewSite::$site);
                       $dropdown->redirectSite->addParameter(new ContentParameter());
                       foreach ($contentType->getRestrictedChildContentType() as $child) {
                           $dropdown->addContentType($child);
                       }

                       foreach ($contentType->getRestrictedContentTypeCollectionList() as $child) {
                           //$dropdown->addContentTypeCollectionAsSubmenu($child);
                           $dropdown->addContentTypeCollection($child);
                       }

                   } else {

                       $container = new ContentTypeSubmenuAddContainer($div->col1);
                       $container->parentId = $contentType->getContentId();
                       $container->redirectSite = clone(NewSite::$site);
                       $container->redirectSite->addParameter(new ContentParameter());

                   }

               }

           }*/



           // $dropdown = new MenuDropdown($div->col2);
           // $dropdown->contentType = $contentType;



           // $dropdown=new ContentActionDropdown($div->col2);
           // $dropdown->contentId = $contentType->getContentId();
            /*$dropdown->addContentAction(new FavoriteSaveContentAction());
            $dropdown->addContentAction(new SendToContentAction());





            //new ContentViewChangeForm()

            /*
            $form = new ContentViewChangeForm($div->col3);
            $form->contentType = $contentType;
            //$form->treeId =
            $form->redirectSite = new Site();*/

         /*   $form = new SearchForm($div->col3);

            $viewListBox = new ContentViewListBox($form);
            $viewListBox->contentType = $contentType;
            $viewListBox->submitOnChange = true;
            $viewListBox->searchMode = true;

            new ContentHiddenInput($form);
*/


            //$form=new ContentViewChangeForm($layout->col1);
            //$form->treeId =



            $p = new Paragraph($div->col3);
            $p->content = 'Type: ' . $contentType->typeLabel;

            /*$view = new ContentChildContainer($widget);
            $view->contentType= $contentType;*/


            /*
            if ($viewListBox->hasValue()) {


                $p = new Paragraph($div->col3);
                $p->content = 'View: ' . $viewListBox->getValue();

                /*$viewRow = (new ContentViewReader())->getRowById($viewListBox->getValue());

                $class =$viewRow->viewClass;

                /** @var AbstractContentView $view */
                /* $view = new $class($widget);
                 $view->contentType = $contentType;
 */

           /*     $contentType->getView($viewListBox->getValue(), $widget);

            } else {

               // $contentType->getDefaultView($widget);


            }*/





            //$contentType->getDefaultTreeView($widget);
            //$contentType->getDefaultView()


        }


        $ul = new UnorderedList($layout->col2);

        $treeReader = new TreeReader();
        $treeReader->model->loadChild();
        $treeReader->model->child->loadContentType();
        $treeReader->filter->andEqual($treeReader->model->parentId, $contentType->getContentId());
        $treeReader->addGroup($treeReader->model->child->contentTypeId);
        $treeReader->addOrder($treeReader->model->child->contentType->contentType);

        $count = new CountField($treeReader);

        foreach ($treeReader->getData() as $treeRow) {
            $number = $treeRow->getModelValue($count);
            $ul->addText($treeRow->child->contentType->contentType . ' (' . $number . ')');

            /*
            $childContentType = $treeRow->child->contentType->getContentType();
            if ($childContentType->hasList()) {
                //$list = $childContentType->getList($layout->col2);
                //$list->parentId = $contentType->getContentId();
            }*/

        }


        //$container = new ContentPropertyContainer($layout->col2);
        //$container->contentType = $contentType;

        $container = new TreeIndexContainer($layout->col2);
        $container->contentType = $contentType;
        $container->redirectSite = ExplorerSite::$site;


        /*
        $container = new RelationIndexWidget($layout->col2);
        $container->contentType = $contentType;
        $container->redirectSite = ExplorerSite::$site;
*/


        /*
        $action = new PublicShareAction();
        $action->actionContentId =$contentType->getContentId();
        $container= $action->getDefaultView($layout->col2);
*/


        /*
        $container = new GeoIndexContainer($layout->col2);
        $container->contentType = $contentType;
        $container->redirectSite = ExplorerSite::$site;

        $container = new LogContainer($layout->col2);
        $container->contentType = $contentType;*/




        /*

        $reader = new PublicShareReader();
        $reader->filter->andEqual($reader->model->contentId, $contentType->getContentId());
        foreach ($reader->getData() as $shareRow) {

            $widget = new AdminWidget($layout->col2);
            $widget->widgetTitle = 'Public Share';

            $site = clone(PublicShareSite::$site);
            $site->addParameter(new PublicShareParameter($shareRow->id));

            $input = new BootstrapTextBox($widget);
            $input->name = 'public_url';
            $input->label = 'Public Url';
            $input->value = $site->getUrlWithDomain();


            $btn = new AdminCopyButton($widget);
            $btn->copyId = $input->name;

            // löschen
            // copy

            $btn = new AdminIconSiteButton($widget);
            $btn->site = clone(PublicShareDeleteSite::$site);
            $btn->site->addParameter(new ContentParameter($shareRow->contentId));


        }*/


        /*$container = new LogContainer($layout->col2);
        $container->contentType = $contentType;*/

        $container = new GroupContainer($layout->col2);
        $container->contentType = $contentType;


        /*
        if ($contentType->isObjectOfTrait(GroupIndexTrait::class)) {

            $subtitle = new AdminSubtitle($layout->col2);
            $subtitle->content = 'Group';

            $table = new AdminTable($layout->col2);

            $header = new TableRow($table);
            $header->addText('Group');

            foreach ($contentType->getUserList() as $userRow) {
                $row = new TableRow($table);
                $row->addText($userRow->login);
            }

        }*/

        $container = new CalendarContainer($layout->col2);
        $container->contentType = $contentType;

        /*
        if ($contentType->isObjectOfTrait(TreeIndexTrait::class)) {

            $ul = new UnorderedList($layout->col2);
            foreach ($contentType->getParentContent() as $contentCustomRow) {
                $ul->addText($contentCustomRow->subject);
            }

            $table = new ParentTreeTable($layout->col2);
            $table->contentType = $contentType;
            $table->redirectSite = ExplorerSite::$site;

        }*/

        return parent::getContent();

    }

}