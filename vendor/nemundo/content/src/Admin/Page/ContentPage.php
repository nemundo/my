<?php


namespace Nemundo\Content\Admin\Page;


use Nemundo\Admin\Com\Button\AdminSearchButton;
use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Table\AdminLabelValueTable;
use Nemundo\App\Application\Com\ApplicationListBox;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Content\Admin\Site\ContentDeleteSite;
use Nemundo\Content\Admin\Site\ContentItemSite;
use Nemundo\Content\Admin\Site\ContentTypeRemoveSite;
use Nemundo\Content\Admin\Site\Json\ContentJsonSite;
use Nemundo\Content\Admin\Template\ContentTemplate;
use Nemundo\Content\Com\ListBox\ContentTypeListBox;
use Nemundo\Content\Data\Content\ContentCount;
use Nemundo\Content\Data\Content\ContentModel;
use Nemundo\Content\Data\Content\ContentPaginationReader;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Content\Type\JsonContentTrait;
use Nemundo\Core\Type\Number\Number;
use Nemundo\Db\Filter\Filter;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;
use Nemundo\Package\Bootstrap\Pagination\BootstrapPagination;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\User\Com\ListBox\UserListBox;


class ContentPage extends ContentTemplate
{

    public function getContent()
    {

        $form = new SearchForm($this);

        $formRow = new BootstrapRow($form);

        $application = new ApplicationListBox($formRow);
        $application->submitOnChange = true;
        $application->searchMode = true;

        $listbox = new ContentTypeListBox($formRow);
        $listbox->submitOnChange = true;
        $listbox->searchMode = true;

        $contentIdTextBox = new BootstrapTextBox($formRow);
        $contentIdTextBox->label = 'Content Id';
        $contentIdTextBox->searchMode = true;

        $dataIdTextBox = new BootstrapTextBox($formRow);
        $dataIdTextBox->label = 'Data Id';
        $dataIdTextBox->searchMode = true;

        $user = new UserListBox($formRow);
        $user->submitOnChange = true;
        $user->searchMode = true;

        $subject = new BootstrapTextBox($formRow);
        $subject->label = 'Subject';
        $subject->searchMode = true;


        new AdminSearchButton($formRow);


        /*
        $reader = new ContentTypeReader();
        foreach ($reader->getData() as $contentTypeRow) {
            $listbox->addItem($contentTypeRow->id, $contentTypeRow->phpClass);
        }*/


        //$btn = new AdminSiteButton($this);
        //$btn->site = ContentNewSite::$site;


        $contentReader = new ContentPaginationReader();
        $contentReader->model->loadContentType();
        $contentReader->model->contentType->loadApplication();
        //$contentReader->model->loadUser();

        $filter = new Filter();
        $model = new ContentModel();

        if ($application->hasValue()) {
            $filter->andEqual($contentReader->model->contentType->applicationId, $application->getValue());
        }

        $contentTypeParameter = new ContentTypeParameter();
        $contentTypeParameter->contentTypeCheck = false;
        if ($contentTypeParameter->hasValue()) {


            $btn = new AdminSiteButton($this);
            $btn->site = clone(ContentTypeRemoveSite::$site);
            $btn->site->addParameter($contentTypeParameter);

            $filter->andEqual($model->contentTypeId, $contentTypeParameter->getValue());

            $contentType = $contentTypeParameter->getContentType();

            $table = new AdminLabelValueTable($this);
            $table->addLabelValue('Class', $contentType->getClassName());
            $table->addLabelValue('Type Label', $contentType->typeLabel);
            $table->addLabelValue('Type Id', $contentType->typeId);

            /*$btn = new AdminSiteButton($this);
            $btn->site = clone(RemoveContentSite::$site);
            $btn->site->addParameter($contentTypeParameter);*/

        }

        if ($contentIdTextBox->hasValue()) {
            $filter->andEqual($model->id, $contentIdTextBox->getValue());
        }

        if ($dataIdTextBox->hasValue()) {
            $filter->andEqual($model->dataId, $dataIdTextBox->getValue());
        }

        if ($user->hasValue()) {
        //    $filter->andEqual($model->userId, $user->getValue());
        }

        if ($subject->hasValue()) {
            $filter->andEqual($model->subject, $subject->getValue());
        }

        $count = new ContentCount();
        $count->model->loadContentType();
        $count->filter = $filter;
        $contentCount = $count->getCount();

        $p = new Paragraph($this);
        $p->content = (new Number($contentCount))->formatNumber() . ' Content found';

        $contentReader->filter = $filter;
        $contentReader->addOrder($contentReader->model->id, SortOrder::DESCENDING);
        $contentReader->paginationLimit = 50;

        $table = new AdminClickableTable($this);

        $header = new TableHeader($table);
        $header->addText($contentReader->model->contentType->application->label);
        $header->addText($contentReader->model->id->label);
        $header->addText($contentReader->model->dataId->label);
        $header->addText('Type');
        $header->addText('Type Id');
        $header->addText('Class');

        $header->addText('Subject (Data)');
        $header->addText('Subject (Type)');
        //$header->addText('Date/Time');
        //$header->addText('User');
        $header->addEmpty();
        $header->addEmpty();

        foreach ($contentReader->getData() as $contentRow) {

            $contentType = $contentRow->getContentType();

            $row = new BootstrapClickableTableRow($table);
            $row->addText($contentRow->contentType->application->application);

            $row->addText($contentRow->id);
            $row->addText($contentRow->dataId);
            $row->addText($contentRow->contentType->contentType);
            $row->addText($contentRow->contentTypeId);

            $row->addText($contentType->getClassName());

            $row->addText($contentRow->subject);
            $row->addText($contentType->getSubject());
            //$row->addText($contentRow->dateTime->getShortDateTimeWithSecondLeadingZeroFormat());
            //$row->addText($contentRow->user->login);

            if ($contentType->isObjectOfTrait(JsonContentTrait::class)) {
                $site = clone(ContentJsonSite::$site);
                $site->addParameter(new ContentParameter($contentRow->id));
                $row->addSite($site);
            } else {
                $row->addEmpty();
            }

            /*
            $site = clone(ContentJsonSite::$site);
            $site->addParameter(new ContentParameter($contentRow->id));
            $row->addSite($site);*/

            $site = clone(ContentDeleteSite::$site);
            $site->addParameter(new ContentParameter($contentRow->id));
            $row->addIconSite($site);

            $site = clone(ContentItemSite::$site);
            $site->addParameter(new ContentParameter($contentRow->id));
            $row->addClickableSite($site);

        }


        $pagination = new BootstrapPagination($this);
        $pagination->paginationReader = $contentReader;

        return parent::getContent();

    }

}