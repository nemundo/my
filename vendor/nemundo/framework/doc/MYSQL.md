### Create User

```
mysql -u root
CREATE DATABASE dbname;
GRANT ALL PRIVILEGES ON dbname.* TO 'username'@'localhost' IDENTIFIED BY 'password';
FLUSH PRIVILEGES;
QUIT;
```


```
mysql -e "CREATE DATABASE dbname2;GRANT ALL PRIVILEGES ON dbname.* TO 'username'@'localhost' IDENTIFIED BY 'password';FLUSH PRIVILEGES;"
```



### Strict Mode
```

SET GLOBAL sql_mode = 'STRICT_TRANS_TABLES';

SHOW VARIABLES LIKE "sql_mode";

Disable: mysql> 
SET sql_mode = '';
Enable: mysql> 
SET sql_mode = 'STRICT_ALL_TABLES';
```


```
[mysqld]
sql_mode=NO_ENGINE_SUBSTITUTION,STRICT_TRANS_TABLES
```




mysql -u root -e "create database somedb"





### Slow Query

```
SET GLOBAL slow_query_log=1;
SET GLOBAL slow_query_log_file='mariadb-slow.log';


SHOW VARIABLES LIKE 'slow_query_log_file';



```