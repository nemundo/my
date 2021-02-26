# Nemundo Framework

### Installation
```
composer require nemundo/framework
```

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



### Standalone Admin Installation
```
php -r "require __DIR__.'/vendor/autoload.php';(new \Nemundo\Dev\Install\AdminPackageInstall(getcwd() . DIRECTORY_SEPARATOR))->install();"
```

### Config File erstellen
```
bin/setup.php
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

### Db Index Delete
```
sudo php bin/cmd.php db-index-delete
```



### MySql Dump (outdated)
```
sudo php bin/cmd.php mysql-dump
```

### Db Backup (outdated)
```
sudo php bin/cmd.php db-backup
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


### Admin Setup
```
php bin/cmd.php admin-setup
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







