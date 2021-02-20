```
<Directory "/srv/web/kursklang/web">
    Require all granted
    AllowOverride All
</Directory>
```





```

<VirtualHost *:80>
	ServerName default
	DocumentRoot /srv/web/paranautik/www/default

    <Directory "/srv/web/paranautik/www/default">
		Require all granted
  		AllowOverride All
  	</Directory>


</VirtualHost>

```


