<?php

require 'config.php';

$pageTitle = 'Framework Help';

$doc = new \Nemundo\Package\Bootstrap\Document\BootstrapDocument();
$doc->title = $pageTitle;

$title = new \Nemundo\Admin\Com\Title\AdminTitle($doc);
$title->content = $pageTitle;

$layout = new \Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout($doc);
$layout->col1->columnWidth = 2;
$layout->col2->columnWidth = 2;


$list = new \Nemundo\Package\Bootstrap\Listing\BootstrapHyperlinkList($layout->col1);


$path = '';

$reader = new \Nemundo\Core\File\DirectoryReader();
$reader->includeDirectories = true;
$reader->includeFiles = false;
$reader->path =$path;
//$reader->path = __DIR__;

foreach ($reader->getData() as $file) {


    $url = '?file=' . $file->filename;
    $list->addHyperlink($file->filename, $url);

}


$parameter = new \Nemundo\Web\Parameter\UrlParameter();  // new \Nemundo\Web\Http\Parameter\GetParameter();  // new \Nemundo\Web\Http\Parameter\UrlParameter();
$parameter->parameterName = 'file';

if ($parameter->hasValue()) {

    $title = new \Nemundo\Admin\Com\Title\AdminTitle($layout->col2);
    $title->content = $parameter->getValue();


    $reader = new \Nemundo\Core\File\DirectoryReader();
    $reader->includeDirectories =false;
    $reader->includeFiles = true;
    $reader->recursiveSearch = true;
    $reader->path = $path.DIRECTORY_SEPARATOR.$parameter->getValue();


    foreach ($reader->getData() as $file) {

        //(new Debug())->write($file->fullFilename);


        $h4 = new \Nemundo\Html\Heading\H4($layout->col2);
        $h4->content = $file->getFilenameWithoutExtension();

        //$h4 = new \Nemundo\Html\Heading\H4($layout->col2);
        //$h4->content = $file-> getFigetFilenameWithoutExtension();

        $url = (new \Nemundo\Core\Type\Text\Text($file->fullFilename))->replaceLeft($path.DIRECTORY_SEPARATOR,'')->getValue();


        $link = new \Nemundo\Com\Html\Hyperlink\UrlHyperlink($layout->col2);
        $link->content = 'Run';
        $link->url = $url;  // (new Text(WebConfig::$webUrl))->replace('/web', '')->getValue() . (new Text($file->fullFilename))->replace(ProjectConfig::$projectPath, '')->getValue();
        $link->openNewWindow = true;


        new \Nemundo\Html\Block\Hr($layout->col2);


    }


}





$doc->render();

