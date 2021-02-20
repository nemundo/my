<?php
namespace Nemundo\Content\App\Explorer\Data\PrivateShare;
class PrivateShareModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
*/
public $contentId;

/**
* @var \Nemundo\Content\Data\Content\ContentExternalType
*/
public $content;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
*/
public $groupId;

/**
* @var \Nemundo\Content\Index\Group\Data\Group\GroupExternalType
*/
public $group;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
*/
public $userId;

/**
* @var \Nemundo\User\Data\User\UserExternalType
*/
public $user;

protected function loadModel() {
$this->tableName = "explorer_private_share";
$this->aliasTableName = "explorer_private_share";
$this->label = "Private Share";

$this->primaryIndex = new \Nemundo\Db\Index\UniqueIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "explorer_private_share";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "explorer_private_share_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->contentId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->contentId->tableName = "explorer_private_share";
$this->contentId->fieldName = "content";
$this->contentId->aliasFieldName = "explorer_private_share_content";
$this->contentId->label = "Content";
$this->contentId->allowNullValue = true;

$this->groupId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->groupId->tableName = "explorer_private_share";
$this->groupId->fieldName = "group";
$this->groupId->aliasFieldName = "explorer_private_share_group";
$this->groupId->label = "Group";
$this->groupId->allowNullValue = true;

$this->userId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->userId->tableName = "explorer_private_share";
$this->userId->fieldName = "user";
$this->userId->aliasFieldName = "explorer_private_share_user";
$this->userId->label = "User";
$this->userId->allowNullValue = true;

}
public function loadContent() {
if ($this->content == null) {
$this->content = new \Nemundo\Content\Data\Content\ContentExternalType($this, "explorer_private_share_content");
$this->content->tableName = "explorer_private_share";
$this->content->fieldName = "content";
$this->content->aliasFieldName = "explorer_private_share_content";
$this->content->label = "Content";
}
return $this;
}
public function loadGroup() {
if ($this->group == null) {
$this->group = new \Nemundo\Content\Index\Group\Data\Group\GroupExternalType($this, "explorer_private_share_group");
$this->group->tableName = "explorer_private_share";
$this->group->fieldName = "group";
$this->group->aliasFieldName = "explorer_private_share_group";
$this->group->label = "Group";
}
return $this;
}
public function loadUser() {
if ($this->user == null) {
$this->user = new \Nemundo\User\Data\User\UserExternalType($this, "explorer_private_share_user");
$this->user->tableName = "explorer_private_share";
$this->user->fieldName = "user";
$this->user->aliasFieldName = "explorer_private_share_user";
$this->user->label = "User";
}
return $this;
}
}