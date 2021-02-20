<?php
namespace Nemundo\Content\App\Map\Data\Route;
class RouteExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $route;

/**
* @var \Nemundo\Model\Type\File\FileType
*/
public $gpxFile;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = RouteModel::class;
$this->externalTableName = "map_route";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->route = new \Nemundo\Model\Type\Text\TextType();
$this->route->fieldName = "route";
$this->route->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->route->aliasFieldName = $this->route->tableName . "_" . $this->route->fieldName;
$this->route->label = "Route";
$this->addType($this->route);

$this->gpxFile = new \Nemundo\Model\Type\File\FileType();
$this->gpxFile->fieldName = "gpx_file";
$this->gpxFile->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->gpxFile->aliasFieldName = $this->gpxFile->tableName . "_" . $this->gpxFile->fieldName;
$this->gpxFile->label = "Gpx File";
$this->addType($this->gpxFile);

}
}