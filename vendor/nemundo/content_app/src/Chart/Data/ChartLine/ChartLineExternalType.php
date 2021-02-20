<?php
namespace Nemundo\Content\App\Chart\Data\ChartLine;
class ChartLineExternalType extends \Nemundo\Model\Type\External\ExternalType {
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
public $lineLabel;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = ChartLineModel::class;
$this->externalTableName = "chart_chart_line";
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

$this->lineLabel = new \Nemundo\Model\Type\Text\TextType();
$this->lineLabel->fieldName = "line_label";
$this->lineLabel->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->lineLabel->aliasFieldName = $this->lineLabel->tableName . "_" . $this->lineLabel->fieldName;
$this->lineLabel->label = "Line Label";
$this->addType($this->lineLabel);

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