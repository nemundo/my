<?php
namespace Nemundo\Content\App\Chart\Data\Chart;
class ChartRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var ChartModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $chart;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->chart = $this->getModelValue($model->chart);
}
}