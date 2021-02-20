<?php
namespace Nemundo\Content\App\Chart\Data\ChartLine;
class ChartLineModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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
public $lineLabel;

protected function loadModel() {
$this->tableName = "chart_chart_line";
$this->aliasTableName = "chart_chart_line";
$this->label = "Chart Line";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "chart_chart_line";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "chart_chart_line_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->chartId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->chartId->tableName = "chart_chart_line";
$this->chartId->fieldName = "chart";
$this->chartId->aliasFieldName = "chart_chart_line_chart";
$this->chartId->label = "Chart";
$this->chartId->allowNullValue = true;

$this->lineLabel = new \Nemundo\Model\Type\Text\TextType($this);
$this->lineLabel->tableName = "chart_chart_line";
$this->lineLabel->fieldName = "line_label";
$this->lineLabel->aliasFieldName = "chart_chart_line_line_label";
$this->lineLabel->label = "Line Label";
$this->lineLabel->allowNullValue = true;
$this->lineLabel->length = 255;

}
public function loadChart() {
if ($this->chart == null) {
$this->chart = new \Nemundo\Content\App\Chart\Data\Chart\ChartExternalType($this, "chart_chart_line_chart");
$this->chart->tableName = "chart_chart_line";
$this->chart->fieldName = "chart";
$this->chart->aliasFieldName = "chart_chart_line_chart";
$this->chart->label = "Chart";
}
return $this;
}
}