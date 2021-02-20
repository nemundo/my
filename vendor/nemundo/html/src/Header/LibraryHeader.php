<?php

namespace Nemundo\Html\Header;


use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Html\Header\Link\StylesheetLink;
use Nemundo\Html\Script\JavaScript;


class LibraryHeader extends AbstractHeaderHtmlContainer  // AbstractHtmlContainer
{

    private static $jsUrlList = [];

    private static $cssUrlList = [];

    private static $jsList = [];

    private static $styleList = [];

    /**
     * @var AbstractHtmlContainer[]
     */
    private static $headerContainerList = [];

    public static function addCssUrl($url)
    {

        LibraryHeader::$cssUrlList[] = $url;

    }


    public static function addJsUrl($url)
    {

        LibraryHeader::$jsUrlList[] = $url;

    }


    public static function addStyle($style)
    {

        LibraryHeader::$styleList[] = $style;

    }

    public static function addJavaScript($code)
    {

        LibraryHeader::$jsList[] = $code;

    }


    /*
    public static function addHeaderContainer(AbstractHtmlContainer $container)
    {

        LibraryHeader::$headerContainerList[] = $container;


    }


    public function getHeaderContainerList() {
        return LibraryHeader::$headerContainerList;
    }*/


    public function getContent()
    {

        LibraryHeader::$jsUrlList = array_unique(LibraryHeader::$jsUrlList);
        foreach (LibraryHeader::$jsUrlList as $filename) {
            $js = new JavaScript($this);
            $js->src = $filename;
        }

        LibraryHeader::$cssUrlList = array_unique(LibraryHeader::$cssUrlList);
        foreach (LibraryHeader::$cssUrlList as $filename) {
            $css = new StylesheetLink($this);
            $css->href = $filename;
        }

        if (count(LibraryHeader::$styleList) > 0) {
            $style = new Style($this);
            foreach (LibraryHeader::$styleList as $value) {
                $style->addStyle($value);
            }
        }


        if (count(LibraryHeader::$jsList) > 0) {
            $style = new JavaScript($this);
            foreach (LibraryHeader::$jsList as $value) {
                $style->addCodeLine($value);
            }
        }


        /*
        foreach (LibraryHeader::$headerContainerList as $container) {
            $this->addContainer($container);
        }*/

        return parent::getContent();

    }

}