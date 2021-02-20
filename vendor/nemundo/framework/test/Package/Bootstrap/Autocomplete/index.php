<?php

require '../../config.php';
require 'AutocompleteController.php';
require 'AutocompleteSite.php';
require 'AutocompleteDocument.php';
require 'AutocompleteSourceJsonSite.php';


 \Nemundo\Web\WebConfig::$webUrl = '/paranautik/lib/framework/test/Bootstrap/Autocomplete/';

(new AutocompleteController())->render();


//(new AutocompleteDocument())->render();




