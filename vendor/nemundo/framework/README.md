# Nemundo Framework

### Installation
```
composer init ()
composer require nemundo/framework
```
--> kein .ignore File erzeugen


### Project Intallation
```
php -r "require __DIR__.'/vendor/autoload.php';(new \Nemundo\Dev\ProjectBuilder\ProjectBuilderScript())->createProject();"
```

### Add Autoloader (composer.json)
```
  "autoload": {
    "psr-4": {
      "ProjectNamespace\\": "src/"
    }
  }
```

###Run Composer Update
```
composer update
```


### Initial Setup
```
php bin/init.php
```


### Setup
```
php bin/setup.php
```



### Admin Interface Setup
```
php bin/cmd.php admin-setup
```


### Create Admin User
```
php bin/cmd.php admin-user
```

### Password Reset
```
php bin\cmd.php user-password-reset
```

### Usergroup Clean
```
sudo php bin/cmd.php usergroup-clean
```

### Htaccess Build
```
sudo php bin/cmd.php htaccess-build
```

### Database Backup
```
sudo php bin/cmd.php backup-dump
sudo php bin/cmd.php backup-import
sudo php bin/cmd.php backup-clean
```


### Model Image Resize
```
sudo php bin/cmd.php model-image-resize
```

### Db Index Delete
```
sudo php bin/cmd.php db-index-delete
```


### Project Clean (Delete Databas/Files)
```
sudo php bin/cmd.php project-clean
```










### Scheduler Installation

Folgender Befehl muss als Cronjob eingerichtet werden. 
```
php bin/cmd.php scheduler-check
```


```
cronjob -e
* * * * * php /srv/web/[project]/bin/cmd.php scheduler-check > /srv/web/[project]/log/scheduler-check.log 2>&1
```









### Cache Path
Im config.ini muss der Pfad definiert werden.
```
cache_path=
```


### Config Setup with Argument
```
php -r "require __DIR__.'/vendor/autoload.php';(new \Nemundo\Project\Config\ProjectConfigArgumentBuilder())->createConfig();"
(new \Nemundo\Project\Config\ProjectConfigArgumentBuilder())->createConfig('/srv/web/project/', 'localhost', 3306, 'root', 'password', 'db1');
```



### Dependency

Mail
```
composer require swiftmailer/swiftmailer
```

Rss Reader
```
composer require laminas/laminas-http
composer require laminas/laminas-feed
```

Excel
```
composer require phpoffice/phpspreadsheet
```

Mobile Detection
```
composer require mobiledetect/mobiledetectlib
```

SSH
```
composer require phpseclib/phpseclib
```






