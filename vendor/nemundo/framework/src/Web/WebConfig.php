<?php

namespace Nemundo\Web;

use Nemundo\Html\Document\HtmlDocument;
use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Web\Template\Forbidden403Page;
use Nemundo\Web\Template\NotFound404Page;

class WebConfig extends AbstractBaseClass
{

    /**
     * @var string
     */
    public static $domain;

    /**
     * @var string
     */
    public static $webPath;

    /**
     * @var string
     */
    public static $webUrl;
    // baseUrl

    /**
     * @var HtmlDocument
     */
    public static $notFound404Page = NotFound404Page::class;

    /**
     * @var HtmlDocument
     */
    public static $forbidden403Page = Forbidden403Page::class;




}