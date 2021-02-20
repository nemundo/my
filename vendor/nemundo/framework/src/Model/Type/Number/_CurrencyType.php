<?php

namespace Nemundo\Model\Type\Number;

use Nemundo\Core\Type\Currency;

class CurrencyType extends DecimalNumberType
{

    public $currency = Currency::CHF;

}