<?php

namespace Nemundo\Package\ChartJs;


use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Com\Container\LibraryTrait;


class ChartJs extends AbstractHtmlContainer
{

    use LibraryTrait;

    public function getContent()
    {

        $this->addJsUrl('https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js');


        /*
        $canvas = new Canvas($this);
        $canvas->id = 'chart';
        $canvas->width = 800;
        $canvas->height = 400;

        $script = new JavaScript($this);
        $script->addScript('var ctx = document.getElementById("chart").getContext("2d");');
        $script->addScript('var myChart = new Chart(ctx).Line(data);');


        /*$script->addScript('window.onload = function() {');
        $script->addScript('var ctx = document.getElementById("chart").getContext(\'2d\');');
        $script->addScript('var myChart = new Chart(ctx, {');
        $script->addScript('type: \'bar\',');
        $script->addScript('data: {');
        $script->addScript('labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],');
        $script->addScript('datasets: [{');
        $script->addScript('label: \'# of Votes\',');
        $script->addScript('data: [12, 19, 3, 5, 2, 3],');
        $script->addScript('backgroundColor: [');
        $script->addScript(' \'rgba(255, 99, 132, 0.2)\',');
        $script->addScript('\'rgba(54, 162, 235, 0.2)\',');
        //$script->addScript('}]');*/

        /*$script->addScript('],');
        $script->addScript('}],');
        $script->addScript('}');
        //$script->addScript('}');
        $script->addScript('');
        $script->addScript('');
        $script->addScript('');
        //$script->addScript(' }]');
        $script->addScript('});');
        $script->addScript('');
        $script->addScript('}');*/


        /*
 
 
 
 
 
 
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
 
             borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
             borderWidth: 1
         }]
     },
     options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                 }
                }]
         }
        }
 });
 
 
        //<canvas id="myChart" width="400" height="400"></canvas>
 
 
        /*
        <script src="path/to/chartjs/dist/Chart.js"></script>
 <script>
     var myChart = new Chart(ctx, {...});
 </script>*/


        return parent::getContent();
    }


}