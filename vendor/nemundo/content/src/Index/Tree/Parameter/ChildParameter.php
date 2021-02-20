<?php


namespace Nemundo\Content\Index\Tree\Parameter;


use Nemundo\Content\Data\Content\ContentReader;
use Nemundo\Content\Parameter\AbstractContentUrlParameter;
use Nemundo\Web\Parameter\AbstractUrlParameter;

class ChildParameter extends AbstractContentUrlParameter
{

    protected function loadParameter()
    {
        $this->parameterName = 'child';
    }

    /*
    public function getContentType()
    {

        $reader = new ContentReader();
        $reader->model->loadContentType();
        $contentRow = $reader->getRowById($this->getValue());
        $contentType = $contentRow->getContentType();

        return $contentType;

    }*/


}