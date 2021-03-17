<?php

require 'config.php';

(new \Nemundo\Project\Config\ProjectConfigBuilderScript())->run();
(new \Nemundo\Db\Provider\MySql\Database\MySqlDatabase())->createDatabase();
