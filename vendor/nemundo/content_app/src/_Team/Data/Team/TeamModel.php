<?php
namespace Nemundo\Content\App\Team\Data\Team;
class TeamModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $team;

protected function loadModel() {
$this->tableName = "team_team";
$this->aliasTableName = "team_team";
$this->label = "Team";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "team_team";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "team_team_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->team = new \Nemundo\Model\Type\Text\TextType($this);
$this->team->tableName = "team_team";
$this->team->fieldName = "team";
$this->team->aliasFieldName = "team_team_team";
$this->team->label = "Team";
$this->team->allowNullValue = true;
$this->team->length = 255;

}
}