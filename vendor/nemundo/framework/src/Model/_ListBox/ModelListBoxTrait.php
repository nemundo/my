<?php


namespace Nemundo\Model\ListBox;


use Nemundo\Db\Connection\AbstractConnection;
use Nemundo\Db\DbConfig;
use Nemundo\Db\Filter\Filter;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Model\Definition\Model\AbstractModel;
use Nemundo\Model\Reader\ModelDataReader;
use Nemundo\Model\Type\AbstractModelType;

trait ModelListBoxTrait
{

    /**
     * @var AbstractConnection
     */
    public $connection;

    /**
     * @var AbstractModel
     */
    public $model;

    /**
     * @var Filter
     */
    public $filter;

    /**
     * @var AbstractModelType[]
     */
    public $valueField;

    /**
     * @var ModelDataReader
     */
    protected $reader;


    protected function loadModelListBox()
    {
        $this->reader = new ModelDataReader();
        $this->filter = new Filter();
    }


    protected function loadHtml()
    {

        if ($this->connection == null) {
            $this->connection = DbConfig::$defaultConnection;
        }

        $this->reader->connection = $this->connection;
        $this->reader->model = $this->model;
        $this->reader->filter = $this->filter;
        $this->reader->addFieldByModel($this->model);

        /*
        if ($this->model->isObjectOfTrait(ActiveModelTrait::class)) {
            $this->reader->filter->andEqual($this->model->active, true);
        }*/

    }


    public function addOrder(AbstractModelType $type, $sortOrder = SortOrder::ASCENDING)
    {
        $this->reader->addOrder($type, $sortOrder);
        return $this;
    }

}