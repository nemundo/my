<?php


// AutocompleteTestDocument
class AutocompleteDocument extends \Nemundo\Package\Bootstrap\Document\BootstrapDocument
{

    public function getContent()
    {

        $this->title = 'Autocomplete Example';

        $h2 = new \Nemundo\Html\Heading\H2($this);
        $h2->content = $this->title;

        //$box = new \Nemundo\Package\Bootstrap\Autocomplete\BootstrapAutocompleteTextBox($this);

        $box=new \Nemundo\Package\Bootstrap\Autocomplete\BootstrapAutocompleteMultipleValueTextBox($this);
        $box->label = 'Search';
        $box->sourceSite = AutocompleteSourceJsonSite::$site;
        $box->seperator=' ';



        return parent::getContent();

    }


}