<?php

require '../../../../autoload.php';


\Nemundo\Web\WebConfig::$webUrl='/schleuniger/lib/framework/doc/Web/';

\Nemundo\Db\DbConfig::$sqlDebug=true;

class TestController extends \Nemundo\Web\Site\AbstractController {


    protected function loadController()
    {
        // TODO: Implement loadController() method.
    }

}




class TestSite extends \Nemundo\Web\Site\AbstractSite {


    protected function loadSite()
    {
        // TODO: Implement loadSite() method.
        $this->url = 'Controller.php';
    }


    public function loadContent()
    {

        $html = new \Nemundo\Html\Document\HtmlDocument();

        $p = new \Nemundo\Html\Paragraph\Paragraph($html);
        $p->content = 'Web Controller Test';

        $html->render();


    }


}

(new TestController())->render();




