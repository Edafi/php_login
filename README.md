# How to run
`docker-compose up -d`

## Troubleshooting
I dont really know how to set a proper host on mysqli, so sometimes site doesnot work properly. This issue appears because 
i set an ip address in host for connection. Simple solution to this probles is to change ip address in src/sql_methods.php
while all containers are running. 
`$conn = new mysqli("[ip address of mariadb container]:3306", "root", "admin", "php_login");`
