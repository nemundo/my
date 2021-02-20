<?php
namespace Nemundo\Content\App\Chart\Data\ChartLine;
class ChartLineRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var ChartLineModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var int
*/
public $chartId;

/**
* @var \Nemundo\Content\App\Chart\Data\Chart\ChartRow
*/
public $chart;

/**
* @var string
*/
public $lineLabel;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->chartId = intval($this->getModelValue($model->chartId));
if ($model->chart !== null) {
$this->loadNemundoContentAppChartDataChartChartchartRow($model->chart);
}
$this->lineLabel = $this->getModelValue($model->lineLabel);
}
private function loadNemundoContentAppChartDataChartChartchartRow($model) {
$this->chart = new \Nemundo\Content\App\Chart\Data\Chart\ChartRow($this->row, $model);
}
}