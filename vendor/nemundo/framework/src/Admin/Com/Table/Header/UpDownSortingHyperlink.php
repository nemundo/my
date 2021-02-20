<?php

namespace Nemundo\Admin\Com\Table\Header;


use Nemundo\Admin\Parameter\PageParameter;
use Nemundo\Admin\Parameter\SortingParameter;
use Nemundo\Admin\Parameter\SortOrderParameter;
use Nemundo\Com\Html\Hyperlink\SiteHyperlink;
use Nemundo\Core\Language\Translation;
use Nemundo\Db\Reader\AbstractSqlReader;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Db\Sql\Order\SqlOrderTrait;
use Nemundo\Html\Table\Th;
use Nemundo\Model\Type\AbstractModelType;
use Nemundo\Web\Site\Site;


class UpDownSortingHyperlink extends Th
{

    /**
     * @var AbstractModelType
     */
    public $fieldType;

    /**
     * @var string|string[]
     */
    public $label;

    /**
     * @var string
     */
    public $sortOrder = SortOrder::ASCENDING;

    public function getContent()
    {

        $this->nowrap = true;
        $this->title = 'Sortierung ' . (new Translation())->getText($this->label);

        $hyperlink = new SiteHyperlink($this);

        if ($this->label == null) {
            $this->label = $this->fieldType->label;
        }

        $hyperlink->content = $this->label;

        $hyperlink->site = new Site();

        $sortingParameter = new SortingParameter();

        $existingField = false;
        if ($sortingParameter->getValue() == $this->fieldType->fieldName) {
            $existingField = true;
        }
        $sortingParameter->setValue($this->fieldType->fieldName);

        $hyperlink->site->addParameter($sortingParameter);


        $sortOrderParameter = new SortOrderParameter();

        if ($existingField) {
            if ($sortOrderParameter->getValue() == SortOrder::ASCENDING) {
                $sortOrderParameter->setValue(SortOrder::DESCENDING);
            } else {
                $sortOrderParameter->setValue(SortOrder::ASCENDING);
            }
        } else {
            $sortOrderParameter->setValue($this->sortOrder);
        }

        $hyperlink->site->addParameter($sortOrderParameter);
        $hyperlink->site->addParameter(new PageParameter('0'));

        return parent::getContent();
    }


    //public function checkSorting(AbstractModelDataReader $reader)


    /**
     * @param AbstractSqlReader|SqlOrderTrait $reader
     */
    public function checkSorting(AbstractSqlReader $reader)
    {

        $sortingParameter = new SortingParameter();
        $sortOrderParameter = new SortOrderParameter();

        if ($sortingParameter->getValue() == $this->fieldType->fieldName) {
            $reader->addOrder($this->fieldType, $sortOrderParameter->getValue());
        }

    }

}