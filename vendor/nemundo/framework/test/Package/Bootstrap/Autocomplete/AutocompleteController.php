<?php

class AutocompleteController extends \Nemundo\Web\Controller\AbstractController
{

    protected function loadController()
    {

        new AutocompleteSite($this);
        new AutocompleteSourceJsonSite($this);


    }

}