<?php


namespace Nemundo\Content\Index\Group\Site;


use Nemundo\Content\Index\Group\Check\GroupCheck;
use Nemundo\Content\Index\Group\Check\GroupRestrictedTrait;
use Nemundo\Content\Index\Group\Type\AbstractGroupContentType;
use Nemundo\Web\Site\AbstractSite;


abstract class AbstractGroupRestrictedSite extends AbstractSite
{

    use GroupRestrictedTrait;

}