<?php
namespace Nemundo\Content\App\Explorer\Parameter;
use Nemundo\Web\Parameter\AbstractUrlParameter;
class PublicShareParameter extends AbstractUrlParameter {
protected function loadParameter() {
$this->parameterName = 'publicshare';
}
}