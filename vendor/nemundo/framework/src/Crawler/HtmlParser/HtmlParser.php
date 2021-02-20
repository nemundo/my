<?php

namespace Nemundo\Crawler\HtmlParser;


use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\RegularExpression\RegularExpressionReader;
use Nemundo\Core\Validation\UrlValidation;
use Nemundo\Core\WebRequest\CurlWebRequest;


class HtmlParser extends AbstractBaseClass
{

    public $baseUrl = '';

    private $loaded = false;

    private $html;


    public function fromUrl($url)
    {

        $httpDownload = new CurlWebRequest();
        $this->html = $httpDownload->getUrl($url);

    }


    public function fromHtml($html)
    {
        $this->html = $html;
    }

    public function getHtml()
    {
        return $this->html;
    }


    // getTitle
    public function getPageTitle()
    {

        $this->parse();

        $re = new RegularExpressionReader();
        $re->text = $this->html;
        $re->regularExpression = '<title.*?>(.*?)<';

        $pageTitle = '';  //'[no title]';
        if ($re->hasItems()) {
            $pageTitle = $re->getDataRow()->getValue(0);
        }

        return $pageTitle;

    }


    public function getDescription()
    {

        $this->parse();

        $re = new RegularExpressionReader();
        $re->text = $this->html;
        $re->regularExpression = '<meta name="description" content="(.*?)"';
        //$re->regularExpression = '<meta name="description">(.*?)<';

        $description = '';
        if ($re->hasItems()) {
            $description = $re->getDataRow()->getValue(0);
        }

        return $description;


    }


    public function getRssFeed()
    {

        $this->parse();

        $re = new RegularExpressionReader();
        $re->text = $this->html;
        $re->regularExpression = '<link rel="alternate".*?href="(.*?)".*?>';

        $feedList = [];
        foreach ($re->getData() as $item) {
            $feedList[] = $item->getValue(0);
        }

        return $feedList;

    }


    public function getImage()
    {

        $re = new RegularExpressionReader();
        $re->text = $this->html;
        $re->regularExpression = '<img.*?src="(.*?)".*?>';

        $imageList = [];
        foreach ($re->getData() as $item) {

            $imageUrl = $item[0];

            if (!(new UrlValidation())->isUrl($imageUrl)) {
                $imageUrl = $this->baseUrl . $imageUrl;
            }

            $imageList[] = $imageUrl;
        }

        $imageList = array_unique($imageList);

        return $imageList;

    }


    public function getHyperlink()
    {

        $re = new RegularExpressionReader();
        $re->text = $this->html;
        $re->regularExpression = '<a.*?href="(.*?)".*?>(.*?)</a>';

        $hyperlinkList = [];
        foreach ($re->getData() as $item) {
            $url = $item->getValue(0);

            if (!(new UrlValidation())->isUrl($url)) {
                $url = $this->baseUrl . $url;
            }
            $hyperlinkList[] = $url;

        }

        $hyperlinkList = array_unique($hyperlinkList);

        return $hyperlinkList;

    }


    private function parse()
    {

        if (!$this->loaded) {
            //$this->html = Http::get($this->url);
            //$this->loaded = true;
        }


    }


}