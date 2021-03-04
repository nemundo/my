<?php


namespace Nemundo\Content\Com\ListBox;


use Nemundo\Content\Data\ContentType\ContentTypeReader;
use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;

class ContentTypeListBox extends BootstrapListBox
{

    protected function loadContainer()
    {

        $this->label = 'Content Type';
        $this->name = (new ContentTypeParameter())->parameterName;

        $reader = new ContentTypeReader();
        $reader->addOrder($reader->model->contentType);
        foreach ($reader->getData() as $contentTypeRow) {
            $this->addItem($contentTypeRow->id, $contentTypeRow->contentType);
        }

    }


    public function getContentType() {


        $contentType = (new ContentTypeParameter())->getContentType();
        return $contentType;

    }


}