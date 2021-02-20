<?php

namespace Nemundo\Dev\Help\Script;


use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Com\Html\Hyperlink\UrlHyperlink;
use Nemundo\Com\Html\Listing\UnorderedList;

use Nemundo\Core\File\DirectoryReader;


use Nemundo\Core\TextFile\Reader\TextFileReader;
use Nemundo\Core\TextFile\Writer\TextFileWriter;

use Nemundo\Core\Type\Text\Text;
use Nemundo\FrameworkProject;
use Nemundo\Html\Document\HtmlDocument;
use Nemundo\Html\Heading\H1;

use Nemundo\Package\HighlightJs\HighlightJs;
use Nemundo\Project\ProjectConfig;
use Nemundo\Web\WebConfig;

class HelpScript extends AbstractConsoleScript
{

    protected function loadScript()
    {
   $this->scriptName = 'help-builder';
    }


    public function run()
    {

        // Abbildung Tree


        $help = new HtmlDocument();
        $help->title = 'Help';

        $list = new UnorderedList($help);


        $reader = new DirectoryReader();
        $reader->includeDirectories =true;
        $reader->includeFiles = true;
        $reader->recursiveSearch = true;
        $reader->path = (new Path())
            ->addPath((new FrameworkProject())->path)
            ->addPath('..')
            ->addPath('doc')
          //  ->addPath($helpParameter->getValue())
            ->getPath();

        foreach ($reader->getData() as $file) {

            //(new Debug())->write($file->fullFilename);


            if ($file->isDirectory()) {
                $list->addText($file->filename);
            }


            if ($file->isFile()) {

            $h4 = new H1($help);
            $h4->content = $file->getFilenameWithoutExtension();

            $textFile = new TextFileReader($file->fullFilename);

            //$code = new Code($colRight);
            //$code->content = (new Html($file->getContent()))->getValue();

            //$file->getContent();  //  $textFile->getText();


            $content = new Text($file->getContent());
            $content->replace('<?php', '')->trim();
            //$content->replace('require \'../../config.php\';', '');
            $content->removeRegex('require \'.*?config.php\';');

$html = $content->getValue();
//$html = (new Html( $content->trim()->getValue()))->getValue();

            //$code = new Code($help);
            //$code->content = $html;

            $code = new HighlightJs($help);
            $code->language = 'php';
            $code->code =$html;



            $link = new UrlHyperlink($help);
            $link->content = 'Run';
            $link->url = (new Text(WebConfig::$webUrl))->replace('/web', '')->getValue() . (new Text($file->fullFilename))->replace(ProjectConfig::$projectPath, '')->getValue();
            $link->openNewWindow = true;

            }


        }


        //$help->saveFile(ProjectConfig::$tmpPath.'help.html');


        $filename = ProjectConfig::$tmpPath.'help.html';

        $file = new TextFileWriter($filename);
        $file->overwriteExistingFile=true;
        $file->addLine($help->getContent());
        $file->saveFile();


    }



}