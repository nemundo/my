<?php

namespace Nemundo\Content\Index\Tree\Com\Form;


use Nemundo\Content\Com\Input\ContentTypeHiddenInput;
use Nemundo\Content\Com\ListBox\ContentTypeListBox;
use Nemundo\Content\Index\Tree\Data\RestrictedContentType\RestrictedContentType;
use Nemundo\Content\Index\Tree\Data\RestrictedContentType\RestrictedContentTypeModel;
use Nemundo\Package\Bootstrap\Form\BootstrapForm;

class RestrictedContentTypeForm extends BootstrapForm
{

    public $contentTypeId;

    /**
     * @var ContentTypeListBox
     */
    private $restrictedContentType;

    public function getContent()
    {

        $this->restrictedContentType=new ContentTypeListBox($this);
        $this->restrictedContentType->label='Restrictecd Content Type';
        $this->restrictedContentType->name = 'restricted_content_type';

        new ContentTypeHiddenInput($this);

        return parent::getContent();

    }


    protected function onSubmit()
    {

        $data=new RestrictedContentType();
        $data->contentTypeId=$this->contentTypeId;
        $data->restrictedContentTypeId=$this->restrictedContentType->getValue();
        $data->save();

    }

}