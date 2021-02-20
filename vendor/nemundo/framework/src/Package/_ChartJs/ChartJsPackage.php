<?php

namespace Nemundo\Package\ChartJs;


use Nemundo\Com\Package\AbstractPackage;

class ChartJsPackage extends AbstractPackage
{

    protected function loadPackage()
    {
        $this->packageName = 'chart_js';
        $this->addJs('Chart.min.js');
    }

}