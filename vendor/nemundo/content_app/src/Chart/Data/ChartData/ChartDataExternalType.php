<?php
namespace Nemundo\Content\App\Chart\Data\ChartData;
class ChartDataExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
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

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = ChartDataModel::class;
$this->externalTableName = "chart_chart_data";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->chartId = new \Nemundo\Model\Type\Id\IdType();
$this->chartId->fieldName = "chart";
$this->chartId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->chartId->aliasFieldName = $this->chartId->tableName ."_".$this->chartId->fieldName;
$this->chartId->label = "Chart";
$this->addType($this->chartId);

$this->xValue = new \Nemundo\Model\Type\Text\TextType();
$this->xValue->fieldName = "x_value";
$this->xValue->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->xValue->aliasFieldName = $this->xValue->tableName . "_" . $this->xValue->fieldName;
$this->xValue->label = "X Value";
$this->addType($this->xValue);

$this->yValue = new \Nemundo\Model\Type\Number\NumberType();
$this->yValue->fieldName = "y_value";
$this->yValue->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->yValue->aliasFieldName = $this->yValue->tableName . "_" . $this->yValue->fieldName;
$this->yValue->label = "Y Value";
$this->addType($this->yValue);

}
public function loadChart() {
if ($this->chart == null) {
$this->chart = new \Nemundo\Content\App\Chart\Data\Chart\ChartExternalType(null, $this->parentFieldName . "_chart");
$this->chart->fieldName = "chart";
$this->chart->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->chart->aliasFieldName = $this->chart->tableName ."_".$this->chart->fieldName;
$this->chart->label = "Chart";
$this->addType($this->chart);
}
return $this;
}
}