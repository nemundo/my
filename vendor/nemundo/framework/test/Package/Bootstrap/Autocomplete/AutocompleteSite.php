<?php

class AutocompleteSite extends \Nemundo\Web\Site\AbstractSite
{

    protected function loadSite()
    {
        $this->url = '';
    }


    public function loadContent()
    {
        (new AutocompleteDocument())->render();
    }


}