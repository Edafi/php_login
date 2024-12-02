# How to run
`docker-compose up -d`

## Troubleshooting
I dont really know how to set host on mysqli correctly in container, so sometimes site doesnot work properly. This issue occurs 
because i set an ip address in host to make a connection. Simple solution to this problem is to 
change ip address in file located in `./src/sql_methods.php` while all containers are running. 
```php
$conn = new mysqli("[ip address of mariadb container]:3306", "root", "admin", "php_login");
```
