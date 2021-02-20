### Linux Update
```
sudo su
apt update 
apt upgrade -y
```

```
sudo apt update;sudo apt upgrade -y
```


### Linux Installation

# install apache mysql php and php-modules
```
sudo su

apt-get install -y apache2
apt install apache2


apt install mariadb-server
apt install php7.0
apt install libapache2-mod-php7.0
apt install php7.0-mysql
apt install php7.0-xml
apt install php7.0-mbstring
apt install php7.0-zip


--> evtl, das noch
sudo apt-get install php-gd

```


# Silent Installation
```
sudo apt update;sudo apt upgrade -y;sudo apt install -y curl apache2 mariadb-server php libapache2-mod-php php-mysql php-xml php-mbstring php-zip php-gd php-curl;timedatectl set-timezone Europe/Zurich;sudo a2enmod rewrite;sudo systemctl restart apache2;sudo snap install --classic certbot
```

# PHP
```
sudo vi /etc/php/7.2/apache2/php.ini
```

```
upload_max_filesize = 40M
post_max_size = 40M
```





# Composer
```
apt install -y composer
```



# Enable modules
```
a2enmod rewrite
```

# Set domain 
```
/etc/apache2/apache2.conf
ServerName server_domain_or_IP
```

# restart apache
```
service apache2 reload
apache2ctl configtest
```

```
 # Apache apache2.conf:
 #   AllowOverride All
```








### Remote

```
sudo passwd root
sudo vi /etc/ssh/sshd_config
sudo systemctl restart sshd
```

```
PermitRootLogin yes
```


https://eldernode.com/enable-root-login-via-ssh-in-ubuntu-20/

