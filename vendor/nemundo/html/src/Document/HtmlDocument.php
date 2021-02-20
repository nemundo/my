<?php

namespace Nemundo\Html\Document;

use Nemundo\Core\Http\Response\ContentType;
use Nemundo\Core\Http\Response\HttpResponse;
use Nemundo\Html\Header\LibraryHeader;
use Nemundo\Html\Header\Meta\Meta;
use Nemundo\Html\Header\Title;
use Nemundo\Html\Script\JavaScript;


class HtmlDocument extends AbstractDocument
{

    /**
     * @var string
     */
    public $title;
    // pageTitle
    // headerTitle


    /**
     * @var JavaScript
     */
    protected $script;


    public function __construct()
    {
        parent::__construct(null);
    }


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


    public function getContent()
    {

        $title = new Title($this);
        $title->content = $this->title;

        $meta = new Meta($this);
        $meta->addAttribute('charset', 'UTF-8');

        return parent::getContent();

    }


    public function getHtml()
    {

        $html = new Html();




        $htmlItem = $this->getContent();

        $library = new LibraryHeader();

        $head = new Head($html);
        $head->addContent( $library->getContent()->headerContent . $htmlItem->headerContent);

        $body = new Body($html);
        $body->addContent(PHP_EOL. $htmlItem->bodyContent);

        $html = '<!DOCTYPE html>' . PHP_EOL . $html->getBodyContent();

        return $html;

    }


    public function render()
    {

        $response = new HttpResponse();
        $response->content = $this->getHtml();
        $response->statusCode = $this->statusCode;
        $response->contentType = ContentType::HTML;
        $response->sendResponse();

    }

}
