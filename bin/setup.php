<?php

require "config.php";


(new \Nemundo\Core\Debug\Debug())->write('MyNemundo Installation. Please wait ...');

(new \My\Setup\MySetup())->run();