<?php

namespace Nemundo\Admin\Help\Site;


use Nemundo\Admin\Help\Breadcrumb\HelpBreadcrumb;
use Nemundo\Admin\Help\HelpConfig;
use Nemundo\Admin\Help\Parameter\HelpParameter;
use Nemundo\Com\Html\Hyperlink\UrlHyperlink;
use Nemundo\Html\Heading\H4;

use Nemundo\Core\File\DirectoryReader;
use Nemundo\Core\File\Path;
use Nemundo\Core\Type\Text\Text;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\FrameworkProject;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapColumn;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;
use Nemundo\Package\Bootstrap\Listing\BootstrapHyperlinkList;
use Nemundo\Package\HighlightJs\HighlightJs;
use Nemundo\Project\ProjectConfig;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Web\WebConfig;

class HelpSite extends AbstractSite
{


    protected function loadSite()
    {
        $this->title = 'Help';
        $this->url = 'help';
    }


    protected function registerSite()
    {
        HelpConfig::$helpSite = $this;
    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();


        $helpParameter = new HelpParameter();


        $breadcrumb = new HelpBreadcrumb($page);

        if ($helpParameter->exists()) {
            $breadcrumb->addHelp($helpParameter->getValue());
        }


        $bootstrapRow = new BootstrapRow($page);

        $colLeft = new BootstrapColumn($bootstrapRow);
        $colLeft->columnWidth = 2;

        $colRight = new BootstrapColumn($bootstrapRow);
        $colRight->columnWidth = 10;

        $list = new BootstrapHyperlinkList($colLeft);

        $reader = new DirectoryReader();
        $reader->includeDirectories = true;
        $reader->includeFiles = false;
        $reader->path = (new Path())
            ->addPath((new FrameworkProject())->path)
            ->addPath('..')
            ->addPath('doc')
            ->getPath();

        foreach ($reader->getData() as $file) {
            $site = clone(HelpConfig::$helpSite);
            $site->title = $file->filename;
            $site->addParameter(new HelpParameter($file->filename));
            $list->addSite($site);
        }


        if ($helpParameter->exists()) {

            $reader = new DirectoryReader();
            $reader->includeDirectories = false;;
            $reader->includeFiles = true;
            $reader->recursiveSearch = true;
            $reader->path = (new Path())
                ->addPath((new FrameworkProject())->path)
                ->addPath('..')
                ->addPath('doc')
                ->addPath($helpParameter->getValue())
                ->getPath();

            foreach ($reader->getData() as $file) {

                $h4 = new H4($colRight);
                $h4->content = $file->getFilenameWithoutExtension();

                //$textFile = new TextFileReader();
                //$textFile->filename = $file->fullFilename;

                //$code = new Code($colRight);
                //$code->content = (new Html($file->getContent()))->getValue();

                //$file->getContent();  //  $textFile->getText();


                $content = new Text($file->getContent());
                $content->replace('<?php', '')->trim();
                $content->replace('require \'../../config.php\';', '');

                $code = new HighlightJs($colRight);
                $code->language = 'php';
                $code->code = $content->trim()->getValue();


                $link = new UrlHyperlink($colRight);
                $link->content = 'Run';
                $link->url = (new Text(WebConfig::$webUrl))->replace('/admin', '')->getValue() . (new Text($file->fullFilename))->replace(ProjectConfig::$projectPath, '')->getValue();
                $link->openNewWindow = true;

            }


        }


        $page->render();


    }


}