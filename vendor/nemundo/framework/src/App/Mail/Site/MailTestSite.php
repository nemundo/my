<?php

namespace Nemundo\App\Mail\Site;


use Nemundo\App\Mail\Form\TestMailForm;
use Nemundo\App\Mail\Page\MailTestPage;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;

// TestMailSite
class MailTestSite extends AbstractSite
{

    /**
     * @var MailTestSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Test Mail';
        $this->url = 'test-mail';
        $this->menuActive = false;

        MailTestSite::$site=$this;

    }


    public function loadContent()
    {

        (new MailTestPage())->render();


        /*
        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        new TestMailForm($page);

        $page->render();*/

    }


}