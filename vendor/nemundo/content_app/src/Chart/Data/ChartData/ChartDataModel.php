<?php
namespace Nemundo\Content\App\Chart\Data\ChartData;
class ChartDataModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
*/
public $chartId;

/**
* @var \Nemundo\Content\App\Chart\Data\Chart\ChartExternalType
*/
public $chart;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $xValue;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $yValue;

protected function loadModel() {
$this->tableName = "chart_chart_data";
$this->aliasTableName = "chart_chart_data";
$this->label = "Chart Data";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "chart_chart_data";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "chart_chart_data_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->chartId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->chartId->tableName = "chart_chart_data";
$this->chartId->fieldName = "chart";
$this->chartId->aliasFieldName = "chart_chart_data_chart";
$this->chartId->label = "Chart";
$this->chartId->allowNullValue = true;

$this->xValue = new \Nemundo\Model\Type\Text\TextType($this);
$this->xValue->tableName = "chart_chart_data";
$this->xValue->fieldName = "x_value";
$this->xValue->aliasFieldName = "chart_chart_data_x_value";
$this->xValue->label = "X Value";
$this->xValue->allowNullValue = true;
$this->xValue->length = 255;

$this->yValue = new \Nemundo\Model\Type\Number\NumberType($this);
$this->yValue->tableName = "chart_chart_data";
$this->yValue->fieldName = "y_value";
$this->yValue->aliasFieldName = "chart_chart_data_y_value";
$this->yValue->label = "Y Value";
$this->yValue->allowNullValue = true;

$index = new \Nemundo\Model\Definition\Index\ModelIndex($this);
$index->indexName = "chart";
$index->addType($this->chartId);

}
public function loadChart() {
if ($this->chart == null) {
$this->chart = new \Nemundo\Content\App\Chart\Data\Chart\ChartExternalType($this, "chart_chart_data_chart");
$this->chart->tableName = "chart_chart_data";
$this->chart->fieldName = "chart";
$this->chart->aliasFieldName = "chart_chart_data_chart";
$this->chart->label = "Chart";
}
return $this;
}
}