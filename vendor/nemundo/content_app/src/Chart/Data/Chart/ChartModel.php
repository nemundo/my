<?php
namespace Nemundo\Content\App\Chart\Data\Chart;
class ChartModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $chart;

protected function loadModel() {
$this->tableName = "chart_chart";
$this->aliasTableName = "chart_chart";
$this->label = "Chart";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "chart_chart";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "chart_chart_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->chart = new \Nemundo\Model\Type\Text\TextType($this);
$this->chart->tableName = "chart_chart";
$this->chart->fieldName = "chart";
$this->chart->aliasFieldName = "chart_chart_chart";
$this->chart->label = "Chart";
$this->chart->allowNullValue = true;
$this->chart->length = 255;

}
}