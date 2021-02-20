<?php

namespace Nemundo\Com\Container;


use Nemundo\Com\JavaScript\Code\AbstractJavaScriptCode;
use Nemundo\Com\Package\PackageTrait;
use Nemundo\Html\Header\LibraryHeader;
use Nemundo\Package\Jquery\Code\JqueryReadyCode;
use Nemundo\Web\WebConfig;


trait LibraryTrait
{

    use PackageTrait;

    /**
     * @var JqueryReadyCode
     */
    public static $readyCode;

    public function addCssUrl($url)
    {
        LibraryHeader::addCssUrl($url);
        return $this;
    }


    public function addJsUrl($url)
    {
        LibraryHeader::addJsUrl($url);
        return $this;
    }


    public function addInternalJsUrl($url)
    {
        LibraryHeader::addJsUrl(WebConfig::$webUrl . $url);
        return $this;
    }


    public function addStyle($css)
    {
        LibraryHeader::addStyle($css);
        return $this;
    }


    public function addJavaScript($code)
    {
        LibraryHeader::addJavaScript($code);
        return $this;
    }


    public function addJqueryScript($code)
    {
        LibraryTrait::$readyCode->addCodeLine($code);
        return $this;
    }


    public function addJqueryCode(AbstractJavaScriptCode $code)
    {
        LibraryTrait::$readyCode->addContainer($code);
        return $this;
    }

}