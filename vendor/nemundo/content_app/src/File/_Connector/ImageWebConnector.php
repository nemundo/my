<?php


namespace Nemundo\Content\App\File\Connector;


use Nemundo\Content\App\File\Content\Image\ImageContentType;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Debug\Debug;
use Nemundo\Crawler\WebCrawler\WebCrawler;

abstract class ImageWebConnector extends AbstractBase
{


    abstract protected function loadConnector();


    protected $url;


    public function importData() {

        $crawler = new WebCrawler();
        $crawler->url='https://bernermuenster600.com/medien/fotos/';
        $crawler->regularExpression='data-orig-file="(.*?)"';
        foreach ($crawler->getData() as $item) {

            (new Debug())->write($item->getValue(0));

            $type=new ImageContentType();
            $type->file->fromUrl($item->getValue(0));
            $type->saveType();

        }



    }


}