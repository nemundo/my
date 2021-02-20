<?php
namespace Nemundo\Content\App\Chart\Data\Chart;
class ChartExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $chart;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = ChartModel::class;
$this->externalTableName = "chart_chart";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->chart = new \Nemundo\Model\Type\Text\TextType();
$this->chart->fieldName = "chart";
$this->chart->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->chart->aliasFieldName = $this->chart->tableName . "_" . $this->chart->fieldName;
$this->chart->label = "Chart";
$this->addType($this->chart);

}
}