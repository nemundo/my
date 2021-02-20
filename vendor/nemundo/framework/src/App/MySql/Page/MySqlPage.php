<?php

namespace Nemundo\App\MySql\Page;

use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\App\MySql\Com\ListBox\MySqlTableListBox;
use Nemundo\App\MySql\Com\Table\MySqlDataTable;
use Nemundo\App\MySql\Com\Table\MySqlIndexTable;
use Nemundo\App\MySql\Com\Table\MySqlTableFieldTable;
use Nemundo\App\MySql\Parameter\TableParameter;
use Nemundo\App\MySql\Site\Action\DropTableSite;
use Nemundo\App\MySql\Site\Action\EmptyTableSite;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;

class MySqlPage extends AbstractTemplateDocument
{

    public function getContent()
    {

        $layout=new BootstrapTwoColumnLayout($this);
        $layout->col1->columnWidth = 3;
        $layout->col2->columnWidth= 9;


        $widget=new AdminWidget($layout->col1);
        $widget->widgetTitle='Search';

        $form = new SearchForm($widget);

        $formRow = new BootstrapRow($form);

        $table = new MySqlTableListBox($formRow);
        $table->submitOnChange = true;
        $table->searchMode = true;

        if ($table->hasValue()) {

            $widget=new AdminWidget($layout->col1);
            $widget->widgetTitle = 'Field';

            $data = new MySqlTableFieldTable($widget);
            $data->tableName = $table->getValue();


            $widget=new AdminWidget($layout->col1);
            $widget->widgetTitle = 'Index';

            $data = new MySqlIndexTable($widget);
            $data->tableName = $table->getValue();


            $widget=new AdminWidget($layout->col2);
            $widget->widgetTitle = 'Data';

            $btn = new AdminSiteButton($widget);
            $btn->site = clone(EmptyTableSite::$site);
            $btn->site->addParameter(new TableParameter());

            $btn = new AdminSiteButton($widget);
            $btn->site = clone(DropTableSite::$site);
            $btn->site->addParameter(new TableParameter());

            $data = new MySqlDataTable($widget);
            $data->tableName = $table->getValue();

        }




        return parent::getContent();
    }
}