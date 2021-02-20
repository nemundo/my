<?php

require '../config.php';


(new \Nemundo\Core\Debug\Debug())->write(\Nemundo\Web\WebConfig::$webUrl);


class WebConfigSite extends \Nemundo\Web\Site\AbstractSite {

    protected function loadSite()
    {
        // TODO: Implement loadSite() method.
    }


    public function loadContent()
    {
          }

}

(new WebConfigSite())->redirect();



//$site = new \Nemundo\Web\Site\Site();
//$site->url = \Nemundo\Web\WebConfig::$webUrl;
//$site->redirect();
