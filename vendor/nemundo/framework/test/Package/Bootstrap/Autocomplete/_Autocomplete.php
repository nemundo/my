<?php

require '../../config.php';


class SourceSite extends \Nemundo\Package\Bootstrap\Autocomplete\AbstractAutocompleteJsonSite {

    public static $site;

    protected function loadSite()
    {
        // TODO: Implement loadSite() method.

        SourceSite::$site= $this;
    }


    protected function loadAutocompleteJson()
    {
        // TODO: Implement loadAutocompleteJson() method.
    }


}


new SourceSite();

$html = new \Nemundo\Package\Bootstrap\Document\BootstrapDocument();


$box = new \Nemundo\Package\Bootstrap\Autocomplete\BootstrapAutocompleteTextBox($html);
$box->label = 'Search';
$box->sourceSite = SourceSite::$site;





$html->render();
