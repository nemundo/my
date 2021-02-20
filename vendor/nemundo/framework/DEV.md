### Submodule Installation
```
git submodule add https://github.com/nemundo/framework.git lib/framework
git submodule update --init --recursive


php lib\framework\install\project-install.php

php lib\framework\install\config-install.php

```



### config.php (Dev)

```
<?php

require __DIR__ . '/lib/framework/autoload/autoload.php';
require 'vendor/autoload.php';

$autoload = new Autoloader();

$lib = new Library($autoload);
$lib->source = __DIR__ . '/lib/framework/src/';
$lib->namespace = 'Nemundo';

\Nemundo\Project\ProjectConfig::$projectPath = __DIR__ . DIRECTORY_SEPARATOR;

$config = new \Nemundo\Project\Config\ProjectConfigReader();
$config->filename = __DIR__ . '/config.ini';
$config->readFile();
```


###Submodule Deinstallation
```
git submodule deinit lib/framework
git rm lib/framework
```
