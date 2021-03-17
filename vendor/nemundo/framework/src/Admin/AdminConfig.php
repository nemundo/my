<?php

namespace Nemundo\Admin;


use Nemundo\Package\Bootstrap\Document\BootstrapDocument;
use Nemundo\Web\Controller\AbstractWebController;


class AdminConfig
{

    /**
     * @var string
     */
    public static $defaultTemplateClassName = BootstrapDocument::class;

    /**
     * @var AbstractWebController
     */
    public static $webController;

    /**
     * @var string
     */
    public static $logoUrl;

    /**
     * @var string
     */
    //public static $pageTitle = 'Admin';


    // AdminTemplate (static)

    public static $showPasswordChange = true;

}