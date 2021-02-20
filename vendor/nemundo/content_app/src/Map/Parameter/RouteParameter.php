<?php
namespace Nemundo\Content\App\Map\Parameter;
use Nemundo\Web\Parameter\AbstractUrlParameter;
class RouteParameter extends AbstractUrlParameter {
protected function loadParameter() {
$this->parameterName = 'route';
}
}