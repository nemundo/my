<?php


namespace Nemundo\App\Linux\Page;


use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\App\Linux\Ssh\SshCommand;
use Nemundo\App\Linux\Ssh\SshConnection;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Core\Csv\CsvSeperator;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Local\LocalCommand;
use Nemundo\Core\Type\Text\Text;

class LinuxPage extends AbstractTemplateDocument
{

    public function getContent()
    {


        /*

        $cmd= new SshCommand();
        $cmd->connection= $conn;
        $value = $cmd->runCommand('df');

        (new Debug())->write($value);

        $subtitle=new AdminSubtitle($this);
        $subtitle->content='Diskspace';

        $table=new AdminTable($this);
        foreach ($value as $line) {
            $row=new TableRow($table);

            $cell=new Text($line);
            foreach ($cell->split(CsvSeperator::TAB) as $item) {
                $row->addText($item);
            }
            $row->addText($line);
        }*/

        return parent::getContent();

    }

}