<?php

namespace Nemundo\Content\Index\Tree\Page;

use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\App\Explorer\Content\Container\ContainerContentType;
use Nemundo\Content\Com\ListBox\ContentTypeListBox;
use Nemundo\Content\Com\Widget\ContentWidget;
use Nemundo\Content\Index\Tree\Com\Dropdown\RestrictedContentTypeDropdown;
use Nemundo\Content\Index\Tree\Com\Form\RestrictedContentTypeForm;
use Nemundo\Content\Index\Tree\Data\Tree\TreeReader;
use Nemundo\Content\Index\Tree\Parameter\TreeParameter;
use Nemundo\Content\Index\Tree\Site\TreeNewSite;
use Nemundo\Html\Header\Link\StylesheetLink;
use Nemundo\Package\Bootstrap\Button\BootstrapSiteButton;
use Nemundo\Package\Bootstrap\Icon\BootstrapIcon;

class TreePage extends AbstractTemplateDocument
{
    public function getContent()
    {


        $style = new StylesheetLink($this);
        $style->href = 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css';

        $treeParameter=new TreeParameter();

        //$btn = new BootstrapSiteButton($this);
        //$btn->site = TreeNewSite::$site;


        $dropdown = new RestrictedContentTypeDropdown($this);  // new ContentTypeListBox($this);
        $dropdown->contentTypeId = (new ContainerContentType())->typeId;
$dropdown->redirectSite= clone( TreeNewSite::$site);

       /* $icon = new BootstrapIcon($dropdown);
        $icon->icon = 'plus';
*/

        //<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">


        //<i class="bi bi-plus"></i>


        //$table = new ChildTreeTable($this);


        // Plus Button


        $contentId = 1084;  // (new HomeContentIdStore())->getValue();


        $reader = new TreeReader();
        $reader->model->loadChild();
        $reader->model->child->loadContentType();
        $reader->model->loadView();
        $reader->filter->andEqual($reader->model->parentId, $contentId);
        $reader->addOrder($reader->model->itemOrder);
        foreach ($reader->getData() as $treeRow) {


            //(new Debug())->write($treeRow->id);

            $contentType = $treeRow->child->getContentType();

            $widget = new ContentWidget($this);
            $widget->contentType = $contentType;
            $widget->loadAction = true;


        }


        /*
                $reader = new ChildContentReader();
                $reader->contentType = $this->contentType;
                foreach ($reader->getData() as $treeRow) {



                    $row->addText($treeRow->child->contentType->contentType);



                }*/


        return parent::getContent();
    }
}