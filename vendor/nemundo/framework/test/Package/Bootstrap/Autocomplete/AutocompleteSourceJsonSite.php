<?php


class AutocompleteSourceJsonSite extends \Nemundo\Package\Bootstrap\Autocomplete\AbstractAutocompleteJsonSite
{


    /**
     * @var AutocompleteSourceJsonSite
     */
    public static $site;

    protected function loadSite()
    {
        AutocompleteSourceJsonSite::$site = $this;
    }


    protected function loadAutocompleteJson()
    {

        $term = (new \Paranautik\App\Flight\Parameter\TermParameter())->getValue();

        //$this->addWord('Alpha: '.$term);
        $this->addWord('Alpha');
        $this->addWord('Bravo');

    }


}

