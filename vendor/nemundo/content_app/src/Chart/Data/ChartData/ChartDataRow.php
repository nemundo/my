<?php
namespace Nemundo\Content\App\Chart\Data\ChartData;
class ChartDataRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var ChartDataModel
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
public $xValue;

/**
* @var int
*/
public $yValue;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->chartId = intval($this->getModelValue($model->chartId));
if ($model->chart !== null) {
$this->loadNemundoContentAppChartDataChartChartchartRow($model->chart);
}
$this->xValue = $this->getModelValue($model->xValue);
$this->yValue = intval($this->getModelValue($model->yValue));
}
private function loadNemundoContentAppChartDataChartChartchartRow($model) {
$this->chart = new \Nemundo\Content\App\Chart\Data\Chart\ChartRow($this->row, $model);
}
}